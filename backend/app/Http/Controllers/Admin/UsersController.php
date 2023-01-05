<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DataTables, Notify, Validator, Str, Storage;
use Yajra\DataTables\Html\Builder;
use Auth;
use Event;
use App\Helpers\Helper;
use App\Models\Comment;
use App\Models\User;

class UsersController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     * * * * Create a new controller instance.
     * * * *
     * * * * @return void
     * * * */
    public function __construct()
    {
        $this->authLayout = 'admin.auth.';
        $this->pageLayout = 'admin.pages.user.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index User
    ------------------------------------------------------------------------------------*/
    public function index(Builder $builder, Request $request)
    {
        $user = User::where('user_type', 'user')->orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($user->get())->addIndexColumn()
                ->editColumn('avatar', function (User $user) {
                    if (!$user->avatar) {
                        return '<img class="img-thumbnail" src="' . asset('storage/avatar/default.png') . '" width="60px">';
                    } else {
                        return '<img class="img-thumbnail" src="' . asset('storage/avatar' . '/' . $user->avatar) . '" width="60px">';
                    }
                })
                ->editColumn('status', function (User $user) {
                    if ($user->status == 'active') {
                        return '<a href="javascript:void(0)" data-toggle="tooltip" title="Active" class="changeStatusRecord" data-id="' . $user->id . '"><span class="label label-primary">Active</span></a>';
                    } else {
                        return '<a href="javascript:void(0)" data-toggle="tooltip" title="InActive" class="changeStatusRecord" data-id="' . $user->id . '"><span class="label label-danger">InActive</span></a>';
                    }
                })
                ->editColumn('name', function (User $user) {
                    return $user->first_name . ' ' . $user->last_name;
                })
                ->editColumn('action', function (User $user) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.user.edit', [$user->id]) . '  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteuser ml-1 mr-1" data-id ="' . $user->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ShowUser" data-id="' . $user->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.user.activity_log', [$user->id]) . '  data-toggle="tooltip" title="Order Detail"><i class="fa fa-pencil"></i></a>';
                    return $action;
                })
                ->rawColumns(['status', 'action', 'avatar', 'name'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'NO', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'avatar', 'name' => 'avatar', 'title' => 'Avatar', 'width' => '10%'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'width' => '10%'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email', 'width' => '10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'STATUS', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'ACTION', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create User
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        return view($this->pageLayout . 'create');
    }


    /*-----------------------------------------------------------------------------------
    @Description: Function for Store User
    ------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email'    => 'required|unique:users,email',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|min:8',
            'status' => 'required',
        ], [
            'first_name' => 'The First Name field is required.',
            'last_name' => 'The Last Namefield is required.',
            'email' => 'The Email field is required.',
            'status' => 'The Status field is required.',
            'password.required'              => 'The new password field is required.',
            'password_confirmation.required' => 'The confirm password field is required.'
        ]);
        $validatedData->after(function () use ($validatedData, $request) {
            if ($request->get('password') !== $request->get('password_confirmation')) {
                $validatedData->errors()->add('password_confirmation', 'The Confirm Password does not match.');
            }
        });
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            User::create([
                'first_name' => @$request->get('first_name'),
                'last_name' => @$request->get('last_name'),
                'email' => @$request->get('email'),
                'password' => \Hash::make($request->get('password')),
                'status' => @$request->get('status'),
                'user_type' => 'user'
            ]);
            smilify('success', 'User Created Successfully ⚡️');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit User
    ------------------------------------------------------------------------------------*/
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            return view($this->pageLayout . 'edit', compact('user'));
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update User
    ------------------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'    => 'required|unique:users,email,' . Auth::user()->id,
            'status' => 'required',
        ]);
        try {
            User::where('id', $id)->update([
                'first_name' => @$request->get('first_name'),
                'last_name' => @$request->get('last_name'),
                'email' => @$request->get('email'),
                'status' => @$request->get('status'),
                'user_type' => 'user'
            ]);
            smilify('success', 'User Updated Successfully ⚡️');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete User
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->delete();
            smilify('success', 'User Deleted Successfully ⚡️');
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'User Deleted Successfully..!']);
        } catch (\Exception $e) {
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show User
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Change Status User
    ------------------------------------------------------------------------------------*/
    public function change_status(Request $request)
    {
        try {
            $user = User::where('id', $request->id)->first();
            if ($user->status == "active") {
                User::where('id', $request->id)->update(['status' => "inactive"]);
            } else {
                User::where('id', $request->id)->update(['status' => "active"]);
            }
            smilify('success', 'User Status Updated Successfully ⚡️');
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'User Status Updated Successfully..!']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'title' => 'Error!!', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfile()
    {
        $user = User::where(['status' => 'active', 'id' => Auth::user()->id])->first();
        if (empty($user)) {
            return redirect()->to('admin/dashboard');
        }
        return view($this->pageLayout . 'updateprofile', compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfileDetail(Request $request)
    {
        $validatedData = $request->validate([
            'email'    => 'required|unique:users,email,' . Auth::user()->id,
            'name'    => 'required',
            'avatar'   => 'sometimes|mimes:jpeg,jpg,png'
        ]);
        try {
            $allowedfileExtension = ['pdf', 'jpg', 'png'];
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('avatar', $file, $filename);
            } else {
                $userDetail = User::where('id', Auth::user()->id)->first()->avatar;
                $filename = $userDetail;
            }
            User::where('id', Auth::user()->id)->update([
                'avatar'         => $filename,
                'email'          => $request->email,
                'name'          => $request->name,
            ]);
            smilify('success', 'User Profile Update Successfully ⚡️');
            return redirect()->back();
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for update Password
    ---------------------------------------------------------------------------------- */
    public function updatePassword(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'old_password'          => 'required',
                'password'              => 'required|min:6',
                'password_confirmation' => 'required|min:6',
            ], [
                'old_password.required'          => 'The current password field is required.',
                'password.required'              => 'The new password field is required.',
                'password_confirmation.required' => 'The confirm password field is required.'
            ]);
            $validatedData->after(function () use ($validatedData, $request) {
                if ($request->get('password') !== $request->get('password_confirmation')) {
                    $validatedData->errors()->add('password_confirmation', 'The Confirm Password does not match.');
                }
            });
            if ($validatedData->fails()) {
                return redirect()->back()->withErrors($validatedData)->withInput();
            }
            if (\Hash::check($request->get('old_password'), auth()->user()->password) === false) {
                return redirect()->back();
            }
            $user = auth()->user();
            $user->password = \Hash::make($request->get('password'));
            $user->save();
            smilify('success', 'User Password Update Successfully ⚡️');
            return redirect()->back();
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    public function activitylog($id)
    {
        $user_detail = User::where('id', $id)->first();
        // $user_detail = Comment::where('user_id', $id)->get();
        $messages_count = Comment::where('user_id', $id)->count('user_id');
        return view($this->pageLayout . 'ActivityLog', compact('user_detail','messages_count'));
    }
}
