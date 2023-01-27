<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Brand;
use App\Models\Categories;
use Exception;
class CategoriesController extends Controller
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
        $this->pageLayout = 'admin.pages.categories.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $categories = Categories::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($categories->get())->addIndexColumn()
                ->editColumn('brand_id', function (Categories $categories) {
                    return $categories->brand_details->brand_name;
                })
                ->editColumn('action', function (Categories $categories) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.categories.edit', [$categories->id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deletecategories ml-1 mr-1" data-id ="' . $categories->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showcategories" data-id="' . $categories->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'brand_id'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'brand_id', 'name' => 'brand_id', 'title' => 'Brand Name', 'width' => '10%'],
            ['data' => 'categories_name', 'name' => 'categories_name', 'title' => 'Categories Name', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])->parameters([
            'order' => [],
            'paging'      => true,
            'info'        => true,
            'searchDelay' => 350,
            'dom'         => 'lBfrtip',
            'buttons'     => [
                ['extend' => 'copy', 'title' => "Category Report", 'text' => '<i class="fa fa-copy" aria-hidden="true" style="font-size:16px"></i> Copy', 'exportOptions' => ['columns' => [0, 1, 2]]],
                ['extend' => 'excel', 'title' => "Category Report", 'text' => '<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:16px"></i> Excel', 'exportOptions' => ['columns' => [0, 1, 2]]],
                ['extend' => 'csv', 'title' => "Category Report", 'text' => '<i class="fa fa-file-text-o" aria-hidden="true" style="font-size:16px"></i> CSV', 'exportOptions' => ['columns' => [0, 1, 2]]],
                ['extend' => 'pdf', 'title' => "Category Report", 'text' => '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:16px"></i> PDF', 'exportOptions' => ['columns' => [0, 1, 2]]],
                ['extend' => 'print', 'title' => "Category Report", 'text' => '<i class="fa fa-print" aria-hidden="true" style="font-size:16px"></i> Print', 'exportOptions' => ['columns' => [0, 1, 2]]],
            ],
            'searching'   => true,
        ]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Categories
    ---------------------------------------------------------------------------------- */
    public function create()
    {
        $brand_list = Brand::pluck('brand_name', 'id');
        return view($this->pageLayout . 'create', compact('brand_list'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Categories
    ---------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $customMessages = [
            'categories_name.required'      => 'Categories Name is Required',
            'brand_id.required'             => 'Brand Name is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'categories_name'              => 'required',
            'brand_id'              => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $categories = Categories::create([
                'categories_name'               => @$request->get('categories_name'),
                'brand_id'               => @$request->get('brand_id'),
            ]);
            smilify('success', 'Categories Created Successfully 🔥 !');
            return redirect()->route('admin.categories.index');
        } catch (Exception $e) {
            smilify('error', 'Categories Not Created Successfully 🔥 !');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Categories
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        try {
            $brand_list = Brand::pluck('brand_name', 'id');
            $categories = Categories::where('id', $id)->first();
            if (!empty($categories)) {
                return view($this->pageLayout . 'edit', compact('categories', 'brand_list'));
            } else {
                smilify('error', 'Edit Categories Not Found 🔥 !');
                return redirect()->route('admin.categories.index');
            }
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Categories
    ---------------------------------------------------------------------------------- */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'categories_name.required'             => 'Categories Name is Required',
            'brand_id.required'             => 'Brand Name is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'categories_name'             => 'required',
            'brand_id'             => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            Categories::where('id', $id)->update([
                'categories_name'             => @$request->get('categories_name'),
                'brand_id'               => @$request->get('brand_id')
            ]);
            smilify('success', 'Categories Updated Successfully 🔥 !');
            return redirect()->route('admin.categories.index');
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Categories
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $categories = Categories::where('id', $id)->first();
            $categories->delete();
            smilify('success', 'Categories Deleted Successfully 🔥 !');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Categories Deleted Successfully..!'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Categories
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $categories = Categories::find($request->id);
        return view($this->pageLayout . 'show', compact('categories'));
    }
}
