<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Cms;
use Exception;
class CmsController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     * * * Create a new controller instance.
     * * *
     * * * @return void
     * * */
    public function __construct()
    {
        $this->authLayout = 'auth.';
        $this->pageLayout = 'admin.pages.cms.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $cms = Cms::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($cms->get())->addIndexColumn()
                ->editColumn('description', function (Cms $cms) {
                    return Str::words($cms->description, 10, '....');
                })
                ->editColumn('status', function (Cms $cms) {
                    if ($cms->status == "active") {
                        return '<span class="label label-success">Active</span>';
                    } else {
                        return '<span class="label label-danger">Block</span>';
                    }
                })
                ->editColumn('action', function (Cms $cms) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.cms.edit', [$cms->id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deletecms ml-1 mr-1" data-id ="' . $cms->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showcms" data-id="' . $cms->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    if ($cms->status == "active") {
                        $action .= '<a href="javascript:void(0)" data-value="1" data-toggle="tooltip" title="Active" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="' . $cms->id . '" title="Active"><i class="fa fa-unlock"></i></a>';
                    } else {
                        $action .= '<a href="javascript:void(0)" data-value="0" data-toggle="tooltip" title="Block" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="' . $cms->id . '" title="Block"><i class="fa fa-lock" ></i></a>';
                    }
                    return $action;
                })
                ->rawColumns(['action', 'description', 'image', 'status'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'width' => '10%'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description', 'width' => '10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }
    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Cms
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        try {
            $cms = Cms::where('id', $id)->first();
            if (!empty($cms)) {
                return view($this->pageLayout . 'edit', compact('cms'));
            } else {
                smilify('error', 'Edit Cms Not Found 🔥 !');
                return redirect()->route('admin.cms.index');
            }
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Cms
    ---------------------------------------------------------------------------------- */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'title.required'             => 'title is Required',
            'description.required'       => 'description is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'title'             => 'required',
            'description'       => 'required',
            'status'       => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            Cms::where('id', $id)->update([
                'title'             => @$request->get('title'),
                'description'  => @$request->get('description'),
                'status'  => @$request->get('status')
            ]);
            smilify('success', 'Cms Updated Successfully 🔥 !');
            return redirect()->route('admin.cms.index');
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Cms
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $cms = Cms::where('id', $id)->first();
            $cms->delete();
            smilify('success', 'Cms Deleted Successfully 🔥 !');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Cms Deleted Successfully..!'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Cms
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $cms = Cms::find($request->id);
        return view($this->pageLayout . 'show', compact('cms'));
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for Change Cms Status
    -------------------------------------------------------------------------------------------- */
    public function change_status(Request $request)
    {
        try {
            $cms = Cms::where('id', $request->id)->first();
            if (!empty($cms)) {
                if ($cms->status == "active") {
                    Cms::where('id', $request->id)->update([
                        'status' => "inactive",
                    ]);
                } else {
                    Cms::where('id', $request->id)->update([
                        'status' => "active",
                    ]);
                }
                smilify('success', 'Cms Status Update Successfully 🔥 !');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'Cms Status Updated Successfully..!'
                ]);
            } else {
                smilify('error', 'Cms Status Update Successfully 🔥 !');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'Cms Status Updated Successfully..!'
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
