<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductImage;
use Exception;

class ProductController extends Controller
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
        $this->pageLayout = 'admin.pages.product.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $product = Product::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($product->get())->addIndexColumn()
                ->editColumn('description', function (Product $product) {
                    return Str::words($product->description, 10, '....');
                })
                ->editColumn('price', function (Product $product) {
                    return '₹' . $product->price;
                })
                ->editColumn('action', function (Product $product) {
                    $action  = '';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteproduct ml-1 mr-1" data-id ="' . $product->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a class="btn btn-primary btn-circle btn-sm" href=' . route('admin.product.show', [$product->id]) . '><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'description', 'price'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'width' => '10%'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Price', 'width' => '5%'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])->parameters([
            'order' => [],
            'paging'      => true,
            'info'        => true,
            'searchDelay' => 350,
            'dom'         => 'lBfrtip',
            'buttons'     => [
                ['extend' => 'copy', 'title' => "Product Report", 'text' => '<i class="fa fa-copy" aria-hidden="true" style="font-size:16px"></i> Copy', 'exportOptions' => ['columns' => [0, 1, 2, 3]]],
                ['extend' => 'excel', 'title' => "Product Report", 'text' => '<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:16px"></i> Excel', 'exportOptions' => ['columns' => [0, 1, 2, 3]]],
                ['extend' => 'csv', 'title' => "Product Report", 'text' => '<i class="fa fa-file-text-o" aria-hidden="true" style="font-size:16px"></i> CSV', 'exportOptions' => ['columns' => [0, 1, 2, 3]]],
                ['extend' => 'pdf', 'title' => "Product Report", 'text' => '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:16px"></i> PDF', 'exportOptions' => ['columns' => [0, 1, 2, 3]]],
                ['extend' => 'print', 'title' => "Product Report", 'text' => '<i class="fa fa-print" aria-hidden="true" style="font-size:16px"></i> Print', 'exportOptions' => ['columns' => [0, 1, 2, 3]]],
            ],
            'searching'   => true,
        ]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Product
    ---------------------------------------------------------------------------------- */
    public function create()
    {
        $brand_list = Brand::pluck('brand_name', 'id');
        $categories_list = Categories::pluck('categories_name', 'id');
        return view($this->pageLayout . 'create', compact('categories_list', 'brand_list'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Product
    ---------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $customMessages = [
            'name.required'         => 'Product Name is Required',
            'price.required'        => 'Price is Required',
            'description.required'  => 'Description is Required',
            'brand_id.required'     => 'Brand is Required',
            'category_id.required'  => 'Category is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'name'         => 'required',
            'price'        => 'required',
            'description'  => 'required',
            'brand_id'     => 'required',
            'category_id'  => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {

            $product = Product::create([
                'name'         => @$request->get('name'),
                'price'        => @$request->get('price'),
                'description'  => @$request->get('description'),
                'category_id'  => @$request->get('category_id'),
            ]);
            if (!empty($product)) {
                if ($request->hasFile('image_url')) {
                    foreach ($request->file('image_url') as $key => $image) {
                        $file = $request->file('image_url')[$key];
                        $extension = $file->getClientOriginalExtension();
                        $filename = Str::random(10) . '.' . $extension;
                        // $size = $request->file('image_url')[$key]->getSize();
                        Storage::disk('public')->putFileAs('product', $file, $filename);
                        ProductImage::create([
                            'product_id'         => $product->id,
                            'image'              => @$filename,
                        ]);
                    }
                }
            }
            smilify('success', 'Product Created Successfully 🔥 !');
            return redirect()->route('admin.product.index');
        } catch (Exception $e) {
            smilify('error', 'Product Not Created Successfully 🔥 !');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Product
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $product->delete();
            smilify('success', 'Product Deleted Successfully 🔥 !');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Product Deleted Successfully..!'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Product
    ---------------------------------------------------------------------------------- */
    public function show(Request $request, $id)
    {
        $product = Product::with(['productimage'])->where('id', $id)->first();
        if (!empty($product)) {
            return view($this->pageLayout . 'show', compact('product'));
        } else {
            return redirect()->route('admin.product.index');
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Get Brand For Product
    ---------------------------------------------------------------------------------- */
    public function getbrand(Request $request)
    {
        $data['categories'] = Categories::where('brand_id', $request->idbrand)->get(["categories_name", "id"]);
        return response()->json($data);
    }
}
