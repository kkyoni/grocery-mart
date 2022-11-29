<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DataTables,Notify,Validator,Str,Storage;
use Yajra\DataTables\Html\Builder;
use Auth;
use Event;
use App\Helpers\Helper;
use App\Models\Blog;

class BlogController extends Controller
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
        $this->pageLayout = 'pages.blog.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request){
        $blog = Blog::orderBy('id','desc');
        if (request()->ajax()) {
            return DataTables::of($blog->get())->addIndexColumn()
            ->editColumn('description', function (Blog $blog) {
                return Str::words($blog->description, 10,'....');
            })
            ->editColumn('status', function (Blog $blog) {
                if ($blog->status == "active") {
                    return '<span class="label label-success">Active</span>';
                } else {
                    return '<span class="label label-danger">Block</span>';
                }
            })
            ->editColumn('image', function (Blog $blog){
                if(!$blog->image){
                    return '<img class="img-thumbnail" src="' . asset('storage/blog/default.png').'" width="60px">';
                }else{
                    return '<img class="img-thumbnail" src="' . asset('storage/blog' . '/' . $blog->image) . '" width="60px">';
                }
            })
            ->editColumn('action', function (Blog $blog) {
                $action  = '';
                $action .= '<a class="btn btn-warning btn-circle btn-sm" href='.route('blog.edit',[$blog->id]).'><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                $action .='<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteblog ml-1 mr-1" data-id ="'.$blog->id.'" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showblog" data-id="'.$blog->id.'" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                if($blog->status == "active"){
                    $action .= '<a href="javascript:void(0)" data-value="1" data-toggle="tooltip" title="Active" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="'.$blog->id.'" title="Active"><i class="fa fa-unlock"></i></a>';
                }else{
                    $action .= '<a href="javascript:void(0)" data-value="0" data-toggle="tooltip" title="Block" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="'.$blog->id.'" title="Block"><i class="fa fa-lock" ></i></a>';
                }
                return $action;
            })
            ->rawColumns(['action','description','image','status'])
            ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title','width'=>'10%'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description','width'=>'10%'],
            ['data' => 'image', 'name' => 'image', 'title' => 'image','width'=>'10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status','width'=>'10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'10%',"orderable" => false, "searchable" => false],
        ])
        ->parameters([ 'order' =>[] ]);
        return view($this->pageLayout.'index',compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Blog
    ---------------------------------------------------------------------------------- */
    public function create(){
        return view($this->pageLayout.'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Blog
    ---------------------------------------------------------------------------------- */
    public function store(Request $request){
        $customMessages = [
            'title.required'             => 'Title is Required',
            'description.required'       => 'description is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'title'              => 'required',
            'description'        => 'required',
            'status'             => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        } try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('blog', $file,$filename);
            }else{
                $filename = 'default.png';
            }
            $blog = Blog::create([
                'title'               => @$request->get('title'),
                'description'         => @$request->get('description'),
                'status'              => @$request->get('status'),
                'image'               => @$filename,
            ]);
            smilify('success', 'Blog Created Successfully ⚡️');
            return redirect()->route('blog.index');
        }catch(\Exception $e){
            smilify('error', 'Blog Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Blog
    ---------------------------------------------------------------------------------- */
    public function edit($id){
        try{
            $blog = Blog::where('id',$id)->first();
            if(!empty($blog)){
                return view($this->pageLayout.'edit',compact('blog'));
            }else{
                smilify('error', 'Edit Blog Not Found ⚡️');
                return redirect()->route('blog.index');
            }
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Blog
    ---------------------------------------------------------------------------------- */
    public function update(Request $request,$id){
        $customMessages = [
            'title.required'             => 'title is Required',
            'description.required'       => 'description is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'title'             => 'required',
            'description'       => 'required',
            'status'            => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }try{
            $oldDetails = Blog::find($id);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('blog', $file,$filename);
            }else{
                if($oldDetails->image !== null){
                    $filename = $oldDetails->image;
                }else{
                    $filename = 'default.png';
                }
            }
            Blog::where('id',$id)->update([
                'title'             => @$request->get('title'),
                'description'  => @$request->get('description'),
                'status'  => @$request->get('status'),
                'image'             => @$filename
            ]);
            smilify('success', 'Blog Updated Successfully ⚡️');
            return redirect()->route('blog.index');
        } catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Blog
    ---------------------------------------------------------------------------------- */
    public function delete($id){
        try{
            $blog = Blog::where('id',$id)->first();
            $blog->delete();
            smilify('success', 'Blog Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Blog Deleted Successfully..!'
            ]);
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Blog
    ---------------------------------------------------------------------------------- */
    public function show(Request $request) {
        $blog = Blog::find($request->id);
        return view($this->pageLayout.'show',compact('blog'));
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for Change Blog Status
    -------------------------------------------------------------------------------------------- */
    public function change_status(Request $request){
        try{
            $blog = Blog::where('id',$request->id)->first();
            if(!empty($blog)){
                if($blog->status == "active"){
                    Blog::where('id',$request->id)->update([
                        'status' => "inactive",
                    ]);
                }else{
                    Blog::where('id',$request->id)->update([
                        'status'=> "active",
                    ]);
                }
                smilify('success', 'Blog Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'Blog Status Updated Successfully..!'
                ]);
            }else{
                smilify('error', 'Blog Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'Blog Status Updated Successfully..!'
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
}