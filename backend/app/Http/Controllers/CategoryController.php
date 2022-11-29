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
use App\Models\Category;

class CategoryController extends Controller
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
        $this->pageLayout = 'pages.category.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request){
        $category = Category::orderBy('id','desc');
        if (request()->ajax()) {
            return DataTables::of($category->get())->addIndexColumn()
            ->editColumn('action', function (Category $category) {
                $action  = '';
                $action .= '<a class="btn btn-warning btn-circle btn-sm" href='.route('category.edit',[$category->id]).'><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                $action .='<a class="btn btn-danger btn-circle btn-sm m-l-10 deletecategory ml-1 mr-1" data-id ="'.$category->id.'" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showcategory" data-id="'.$category->id.'" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                return $action;
            })
            ->rawColumns(['action','description','image','status'])
            ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name','width'=>'10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'10%',"orderable" => false, "searchable" => false],
        ])
        ->parameters([ 'order' =>[] ]);
        return view($this->pageLayout.'index',compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Category
    ---------------------------------------------------------------------------------- */
    public function create(){
        return view($this->pageLayout.'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Category
    ---------------------------------------------------------------------------------- */
    public function store(Request $request){
        $customMessages = [
            'name.required'             => 'Name is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'name'              => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        } try{
            $category = Category::create([
                'name'               => @$request->get('name'),
            ]);
            smilify('success', 'Category Created Successfully ⚡️');
            return redirect()->route('category.index');
        }catch(\Exception $e){
            smilify('error', 'Category Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Category
    ---------------------------------------------------------------------------------- */
    public function edit($id){
        try{
            $category = Category::where('id',$id)->first();
            if(!empty($category)){
                return view($this->pageLayout.'edit',compact('category'));
            }else{
                smilify('error', 'Edit Category Not Found ⚡️');
                return redirect()->route('category.index');
            }
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Category
    ---------------------------------------------------------------------------------- */
    public function update(Request $request,$id){
        $customMessages = [
            'name.required'             => 'Name is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'name'             => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }try{
            Category::where('id',$id)->update([
                'name'             => @$request->get('name')
            ]);
            smilify('success', 'Category Updated Successfully ⚡️');
            return redirect()->route('category.index');
        } catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Category
    ---------------------------------------------------------------------------------- */
    public function delete($id){
        try{
            $category = Category::where('id',$id)->first();
            $category->delete();
            smilify('success', 'Category Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Category Deleted Successfully..!'
            ]);
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Category
    ---------------------------------------------------------------------------------- */
    public function show(Request $request) {
        $category = Category::find($request->id);
        return view($this->pageLayout.'show',compact('category'));
    }
}