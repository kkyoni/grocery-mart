<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DataTables,Str,Storage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Auth;
use App\Models\User;
use Event;

class UsersController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     * * Create a new controller instance.
     * *
     * * @return void
     * */
    public function __construct(){
        $this->authLayout = 'auth.';
        $this->pageLayout = 'pages.user.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request){
        $user = User::where('user_type','users')->orderBy('id','desc');
        if (request()->ajax()) {
            return DataTables::of($user->get())->addIndexColumn()
            ->editColumn('created_at', function (User $user) {
                    return date_format($user->created_at,"d M Y H:i A");
            })
            ->editColumn('status', function (User $user) {
                if ($user->status == "active") {
                    return '<span class="label label-success">Active</span>';
                } else {
                    return '<span class="label label-danger">Block</span>';
                }
            })
            ->editColumn('image', function (User $user){
                if(!$user->avatar){
                    return '<img class="img-thumbnail" src="' . asset('storage/avatar/default.png').'" width="60px">';
                }else{
                    return '<img class="img-thumbnail" src="' . asset('storage/avatar' . '/' . $user->avatar) . '" width="60px">';
                }
            })
            ->editColumn('action', function (User $user) {
                $action  = '';
                $action .='<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteuser ml-1 mr-1" data-id ="'.$user->id.'" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showuser" data-id="'.$user->id.'" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                if($user->status == "active"){
                    $action .= '<a href="javascript:void(0)" data-value="1" data-toggle="tooltip" title="Active" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="'.$user->id.'" title="Active"><i class="fa fa-unlock"></i></a>';
                }else{
                    $action .= '<a href="javascript:void(0)" data-value="0" data-toggle="tooltip" title="Block" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="'.$user->id.'" title="Block"><i class="fa fa-lock" ></i></a>';
                }
                return $action;
            })
            ->rawColumns(['action','created_at','image','status'])
            ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name','width'=>'10%'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email','width'=>'10%'],
            ['data' => 'image', 'name' => 'image', 'title' => 'image','width'=>'10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status','width'=>'10%'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At','width'=>'10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'10%',"orderable" => false, "searchable" => false],
        ])
        ->parameters([ 'order' =>[] ]);
        return view($this->pageLayout.'index',compact('html'));
    }


    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete User
    ---------------------------------------------------------------------------------- */
    public function delete($id){
        try{
            $user = User::where('id',$id)->first();
            $user->delete();
            smilify('success', 'User Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'User Deleted Successfully..!'
            ]);
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }


    /*-----------------------------------------------------------------------------------
    @Description: Function for show User
    ---------------------------------------------------------------------------------- */
    public function show(Request $request) {
        $user = User::find($request->id);
        return view($this->pageLayout.'show',compact('user'));
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for Change User Status
    -------------------------------------------------------------------------------------------- */
    public function change_status(Request $request){
        try{
            $user = User::where('id',$request->id)->first();
            if(!empty($user)){
                if($user->status == "active"){
                    User::where('id',$request->id)->update([
                        'status' => "inactive",
                    ]);
                }else{
                    User::where('id',$request->id)->update([
                        'status'=> "active",
                    ]);
                }
                smilify('success', 'User Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'User Status Updated Successfully..!'
                ]);
            }else{
                smilify('error', 'User Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'User Status Updated Successfully..!'
                ]);
            }
        }catch (Exception $e){
            return response()->json([
                'status'    => 'error',
                'title'     => 'Error!!',
                'message'   => $e->getMessage()
            ]);
        }
    }
    

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfile(){
        $user = User::where(['status'=>'active','id'=>Auth::user()->id])->first();
        if(empty($user)){
            return redirect()->to('admin/dashboard');
        }
        return view($this->pageLayout.'updateprofile',compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfileDetail(Request $request){
        $validatedData = $request->validate([
            'email'    => 'required|unique:users,email,'.Auth::user()->id,
            'name'    => 'required',
            'avatar'   => 'sometimes|mimes:jpeg,jpg,png'
        ]);
        try{
            $allowedfileExtension=['pdf','jpg','png'];
            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('avatar', $file,$filename);
            }else{
                $userDetail=User::where('id',Auth::user()->id)->first()->avatar;
                $filename = $userDetail;
            }
            User::where('id',Auth::user()->id)->update([
                'avatar'         => $filename,
                'email'          => $request->email,
                'name'          => $request->name,
            ]);
            smilify('success', 'User Profile Update Successfully ⚡️');
            return redirect()->back();
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for update Password
    ---------------------------------------------------------------------------------- */
    public function updatePassword(Request $request){
        try{
            $validatedData = Validator::make($request->all(),[
                'old_password'          => 'required',
                'password'              => 'required|min:6',
                'password_confirmation' => 'required|min:6',
            ],[
                'old_password.required'          => 'The current password field is required.',
                'password.required'              => 'The new password field is required.',
                'password_confirmation.required' => 'The confirm password field is required.'
            ]);
            $validatedData->after(function() use($validatedData,$request){
                if($request->get('password') !== $request->get('password_confirmation')){
                    $validatedData->errors()->add('password_confirmation','The Confirm Password does not match.');
                }
            });
            if ($validatedData->fails()) {
                return redirect()->back()->withErrors($validatedData)->withInput();
            }
            if (\Hash::check($request->get('old_password'),auth()->user()->password) === false) {
                return redirect()->back();
            }
            $user = auth()->user();
            $user->password =\Hash::make($request->get('password'));
            $user->save();
            smilify('success', 'User Password Update Successfully ⚡️');
            return redirect()->back();
        }catch(Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }
}
