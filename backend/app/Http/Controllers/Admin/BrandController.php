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
use App\Models\Brand;

class BrandController extends Controller
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
        $this->pageLayout = 'admin.pages.brand.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $brand = Brand::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($brand->get())->addIndexColumn()
                ->editColumn('brand_image', function (Brand $brand) {
                    if (!$brand->brand_image) {
                        return '<img class="img-thumbnail" src="' . asset('storage/brand/default.png') . '" width="50px" height="50px">';
                    } else {
                        return '<img class="img-thumbnail" src="' . asset('storage/brand' . '/' . $brand->brand_image) . '" width="50px" height="50px">';
                    }
                })
                ->editColumn('action', function (Brand $brand) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.brand.edit', [$brand->id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteBrand ml-1 mr-1" data-id ="' . $brand->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ShowBrand" data-id="' . $brand->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'brand_image'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'brand_image', 'name' => 'brand_image', 'title' => 'Brand Image', 'width' => '10%'],
            ['data' => 'brand_name', 'name' => 'brand_name', 'title' => 'Brand Name', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Brand
    ---------------------------------------------------------------------------------- */
    public function create()
    {
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Brand
    ---------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $customMessages = [
            'brand_name.required'             => 'Brand Name is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'brand_name'              => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            if ($request->hasFile('brand_image')) {
                $file = $request->file('brand_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('brand', $file, $filename);
            } else {
                $filename = 'default.png';
            }
            Brand::create([
                'brand_name'   => @$request->get('brand_name'),
                'brand_image'   => @$filename,
            ]);
            smilify('success', 'Brand Created Successfully ⚡️');
            return redirect()->route('admin.brand.index');
        } catch (\Exception $e) {
            smilify('error', 'Brand Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Brand
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        try {
            $brand = Brand::where('id', $id)->first();
            if (!empty($brand)) {
                return view($this->pageLayout . 'edit', compact('brand'));
            } else {
                smilify('error', 'Edit Brand Not Found ⚡️');
                return redirect()->route('admin.brand.index');
            }
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Brand
    ---------------------------------------------------------------------------------- */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'brand_name.required'             => 'Brand Name is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'brand_name'             => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $oldDetails = Brand::find($id);
            if ($request->hasFile('brand_image')) {
                $file = $request->file('brand_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('brand', $file, $filename);
            } else {
                if ($oldDetails->brand_image !== null) {
                    $filename = $oldDetails->brand_image;
                } else {
                    $filename = 'default.png';
                }
            }
            Brand::where('id', $id)->update([
                'brand_name'               => @$request->get('brand_name'),
                'brand_image'               => @$filename,
            ]);
            smilify('success', 'Brand Updated Successfully ⚡️');
            return redirect()->route('admin.brand.index');
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Brand
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $brand = Brand::where('id', $id)->first();
            $brand->delete();
            smilify('success', 'Brand Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Brand Deleted Successfully..!'
            ]);
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Brand
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $brand = Brand::find($request->id);
        return view($this->pageLayout . 'show', compact('brand'));
    }
}