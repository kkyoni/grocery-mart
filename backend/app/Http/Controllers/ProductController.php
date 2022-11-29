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
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
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
        $this->pageLayout = 'pages.product.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request){
        $product = Product::orderBy('id','desc');
        if (request()->ajax()) {
            return DataTables::of($product->get())->addIndexColumn()
            ->editColumn('category_id', function (Product $product) {
                return $product->Category->name;
            })
            ->editColumn('sub_title', function (Product $product) {
                return Str::words($product->sub_title, 10,'....');
            })
            ->editColumn('description', function (Product $product) {
                return Str::words($product->description, 10,'....');
            })
            ->editColumn('price', function (Product $product) {
                return '$'. $product->price;
            })
            ->editColumn('image', function (Product $product){
                if(!$product->image){
                    return '<img class="img-thumbnail" src="' . asset('storage/product/default.png').'" width="60px">';
                }else{
                    return '<img class="img-thumbnail" src="' . asset('storage/product' . '/' . $product->image) . '" width="60px">';
                }
            })
            ->editColumn('action', function (Product $product) {
                $action  = '';
                $action .= '<a class="btn btn-warning btn-circle btn-sm" href='.route('product.edit',[$product->id]).'><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                $action .='<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteproduct ml-1 mr-1" data-id ="'.$product->id.'" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showproduct" data-id="'.$product->id.'" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                return $action;
            })
            ->rawColumns(['action','description','image','category_id','sub_title','price'])
            ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
            ['data' => 'category_id', 'name' => 'category_id', 'title' => 'Category Name','width'=>'5%'],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title','width'=>'10%'],
            ['data' => 'image', 'name' => 'image', 'title' => 'Image','width'=>'5%'],
            ['data' => 'sub_title', 'name' => 'sub_title', 'title' => 'Sub Title','width'=>'10%'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Price','width'=>'5%'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description','width'=>'10%'],
            ['data' => 'color', 'name' => 'color', 'title' => 'Color','width'=>'5%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'10%',"orderable" => false, "searchable" => false],
        ])
        ->parameters([ 'order' =>[] ]);
        return view($this->pageLayout.'index',compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Product
    ---------------------------------------------------------------------------------- */
    public function create(){
        $category_list = Category::pluck('name','id');
        return view($this->pageLayout.'create',compact('category_list'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Product
    ---------------------------------------------------------------------------------- */
    public function store(Request $request){
        $customMessages = [
            'category_id.required'       => 'Category Name is Required',
            'title.required'             => 'Title is Required',
            'sub_title.required'         => 'Sub Title is Required',
            'price.required'             => 'Price is Required',
            'description.required'       => 'description is Required',
            'color.required'             => 'Color is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'category_id'       => 'required',
            'title'             => 'required',
            'sub_title'         => 'required',
            'price'             => 'required',
            'description'       => 'required',
            'color'             => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        } try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('product', $file,$filename);
            }else{
                $filename = 'default.png';
            }
            $product = Product::create([
                'category_id'        => @$request->get('category_id'),
                'title'              => @$request->get('title'),
                'image'              => @$filename,
                'sub_title'          => @$request->get('sub_title'),
                'price'              => @$request->get('price'),
                'description'        => @$request->get('description'),
                'color'              => @$request->get('color'),
            ]);
            smilify('success', 'Product Created Successfully ⚡️');
            return redirect()->route('product.index');
        }catch(\Exception $e){
            smilify('error', 'Product Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Product
    ---------------------------------------------------------------------------------- */
    public function edit($id){
        try{
            $product = Product::where('id',$id)->first();
            $category_list = Category::pluck('name','id');
            if(!empty($product)){
                return view($this->pageLayout.'edit',compact('product','category_list'));
            }else{
                smilify('error', 'Edit Product Not Found ⚡️');
                return redirect()->route('product.index');
            }
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Product
    ---------------------------------------------------------------------------------- */
    public function update(Request $request,$id){
        $customMessages = [
            'category_id.required'       => 'Category Name is Required',
            'title.required'             => 'Title is Required',
            'sub_title.required'         => 'Sub Title is Required',
            'price.required'             => 'Price is Required',
            'description.required'       => 'description is Required',
            'color.required'             => 'Color is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'category_id'       => 'required',
            'title'             => 'required',
            'sub_title'         => 'required',
            'price'             => 'required',
            'description'       => 'required',
            'color'             => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }try{
            $oldDetails = Product::find($id);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('product', $file,$filename);
            }else{
                if($oldDetails->image !== null){
                    $filename = $oldDetails->image;
                }else{
                    $filename = 'default.png';
                }
            }
            Product::where('id',$id)->update([
                'category_id'        => @$request->get('category_id'),
                'title'              => @$request->get('title'),
                'image'              => @$filename,
                'sub_title'          => @$request->get('sub_title'),
                'price'              => @$request->get('price'),
                'description'        => @$request->get('description'),
                'color'              => @$request->get('color'),
            ]);
            smilify('success', 'Product Updated Successfully ⚡️');
            return redirect()->route('product.index');
        } catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Product
    ---------------------------------------------------------------------------------- */
    public function delete($id){
        try{
            $product = Product::where('id',$id)->first();
            $product->delete();
            smilify('success', 'Product Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Product Deleted Successfully..!'
            ]);
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Product
    ---------------------------------------------------------------------------------- */
    public function show(Request $request) {
        $product = Product::find($request->id);
        return view($this->pageLayout.'show',compact('product'));
    }
}