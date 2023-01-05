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
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     * * Create a new controller instance.
     * *
     * * @return void
     * */
    public function __construct()
    {
        $this->authLayout = 'auth.';
        $this->pageLayout = 'admin.pages.blog.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $blog = Blog::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($blog->get())->addIndexColumn()
                ->editColumn('description', function (Blog $blog) {
                    return Str::words($blog->description, 10, '....');
                })
                ->editColumn('image', function (Blog $blog) {
                    if (!$blog->image) {
                        return '<img class="img-thumbnail" src="' . asset('storage/blog/default.png') . '" width="60px">';
                    } else {
                        return '<img class="img-thumbnail" src="' . asset('storage/blog' . '/' . $blog->image) . '" width="60px">';
                    }
                })
                ->editColumn('action', function (Blog $blog) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.blog.edit', [$blog->id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteblog ml-1 mr-1" data-id ="' . $blog->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a class="btn btn-primary btn-circle btn-sm" href=' . route('admin.blog.show', [$blog->id]) . '><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'description', 'image'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'width' => '10%'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description', 'width' => '10%'],
            ['data' => 'image', 'name' => 'image', 'title' => 'image', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Blog
    ---------------------------------------------------------------------------------- */
    public function create()
    {
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Blog
    ---------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $customMessages = [
            'title.required'             => 'Title is Required',
            'description.required'       => 'description is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'title'              => 'required',
            'description'        => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('blog', $file, $filename);
            } else {
                $filename = 'default.png';
            }
            $blog = Blog::create([
                'title'               => @$request->get('title'),
                'description'         => @$request->get('description'),
                'image'               => @$filename,
            ]);
            smilify('success', 'Blog Created Successfully ⚡️');
            return redirect()->route('admin.blog.index');
        } catch (\Exception $e) {
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
    public function edit($id)
    {
        try {
            $blog = Blog::where('id', $id)->first();
            if (!empty($blog)) {
                return view($this->pageLayout . 'edit', compact('blog'));
            } else {
                smilify('error', 'Edit Blog Not Found ⚡️');
                return redirect()->route('admin.blog.index');
            }
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Blog
    ---------------------------------------------------------------------------------- */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'title.required'             => 'title is Required',
            'description.required'       => 'description is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'title'             => 'required',
            'description'       => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $oldDetails = Blog::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('blog', $file, $filename);
            } else {
                if ($oldDetails->image !== null) {
                    $filename = $oldDetails->image;
                } else {
                    $filename = 'default.png';
                }
            }
            Blog::where('id', $id)->update([
                'title'             => @$request->get('title'),
                'description'  => @$request->get('description'),
                'image'             => @$filename
            ]);
            smilify('success', 'Blog Updated Successfully ⚡️');
            return redirect()->route('admin.blog.index');
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Blog
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $blog = Blog::where('id', $id)->first();
            $blog->delete();
            smilify('success', 'Blog Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Blog Deleted Successfully..!'
            ]);
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Blog
    ---------------------------------------------------------------------------------- */
    public function show(Request $request, $id)
    {
        $blog = Blog::with('Comment')->where('id', $id)->first();
        $newcomment = Comment::where('blog_id', $id)->where('status', 'unread')->count();
        $totalcomment = Comment::where('blog_id', $id)->count();
        if (!empty($blog)) {
            return view($this->pageLayout . 'show', compact('blog', 'newcomment', 'totalcomment'));
        } else {
            return redirect()->route('admin.blog.index');
        }
    }

    public function load_data(Request $request)
    {
        if (!empty($request->id)) {
            $comment  = Comment::where('id',  '<', $request->id)->where('blog_id', $request->blog_id)->limit(3)->orderBy('id', 'DESC')->get();
        } else {
            $comment  = Comment::where('blog_id', $request->blog_id)->limit(3)->orderBy('id', 'DESC')->get();
        }

        $output =  '';
        $buttonoutput = '';
        $last_id = '';
        if (sizeof($comment) > 0) {

            foreach ($comment as $key => $valueComment) {
                foreach ($valueComment->UserDetails as $valueUserDetails) {
                    $output .= '
                    <div class="feed-element">
                    <a href="#" class="float-left">
                    <img alt="image" class="rounded-circle" src="http://webapplayers.com/inspinia_admin-v2.9.4/img/p1.jpg">
                    </a>
                    <div class="media-body ">
                    <small class="float-right text-navy">1m ago</small>
                    <strong>first_name</strong> started New Comment <strong>Admin</strong>.
                    <br>
                    <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                    <div class="actions">' . $valueComment->comment . '</div>
                    </div>
                    </div>';
                }
                $last_id = $valueComment->id;
            }
            $buttonoutput .= '
                <div id="load_more">
                <button type="button" name="load_more_button" class="btn btn-primary btn-block m"  data-id="' . $last_id . '" id="load_more_button"><i class="fa fa-arrow-down"></i> Show More</button>
                </div>';
        } else {
            $buttonoutput .= '';
        }
        return response()->json([
            'output'    => $output,
            'buttonoutput'     => $buttonoutput,
        ]);
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for Change Blog Status
    -------------------------------------------------------------------------------------------- */
    public function change_status(Request $request)
    {
        try {
            $blog = Blog::where('id', $request->id)->first();
            if (!empty($blog)) {
                if ($blog->status == "active") {
                    Blog::where('id', $request->id)->update([
                        'status' => "inactive",
                    ]);
                } else {
                    Blog::where('id', $request->id)->update([
                        'status' => "active",
                    ]);
                }
                smilify('success', 'Blog Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'Blog Status Updated Successfully..!'
                ]);
            } else {
                smilify('error', 'Blog Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'Blog Status Updated Successfully..!'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'    => 'error',
                'title'     => 'Error!!',
                'message'   => $e->getMessage()
            ]);
        }
    }
}