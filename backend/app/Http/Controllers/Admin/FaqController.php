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
use App\Models\Faq;


class FaqController extends Controller
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
        $this->pageLayout = 'admin.pages.faq.';
        $this->middleware('auth');
    }
    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $faq = Faq::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($faq->get())->addIndexColumn()
                ->editColumn('question', function (Faq $faq) {
                    return Str::words($faq->question, 10, '....');
                })
                ->editColumn('answer', function (Faq $faq) {
                    return Str::words($faq->answer, 10, '....');
                })
                ->editColumn('status', function (Faq $faq) {
                    if ($faq->status == "active") {
                        return '<span class="label label-success">Active</span>';
                    } else {
                        return '<span class="label label-danger">Block</span>';
                    }
                })
                ->editColumn('action', function (Faq $faq) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.faq.edit', [$faq->id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deletefaq ml-1 mr-1" data-id ="' . $faq->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showfaq" data-id="' . $faq->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    if ($faq->status == "active") {
                        $action .= '<a href="javascript:void(0)" data-value="1" data-toggle="tooltip" title="Active" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="' . $faq->id . '" title="Active"><i class="fa fa-unlock"></i></a>';
                    } else {
                        $action .= '<a href="javascript:void(0)" data-value="0" data-toggle="tooltip" title="Block" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="' . $faq->id . '" title="Block"><i class="fa fa-lock" ></i></a>';
                    }
                    return $action;
                })
                ->rawColumns(['action', 'question', 'answer', 'status'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'question', 'name' => 'question', 'title' => 'Question', 'width' => '10%'],
            ['data' => 'answer', 'name' => 'answer', 'title' => 'Answer', 'width' => '10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Faq
    ---------------------------------------------------------------------------------- */
    public function create()
    {
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Faq
    ---------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $customMessages = [
            'question.required'             => 'Question is Required',
            'answer.required'       => 'Answer is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'question'              => 'required',
            'answer'        => 'required',
            'status'             => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $faq = Faq::create([
                'question'               => @$request->get('question'),
                'answer'         => @$request->get('answer'),
                'status'              => @$request->get('status'),
            ]);
            smilify('success', 'Faq Created Successfully ⚡️');
            return redirect()->route('admin.faq.index');
        } catch (\Exception $e) {
            smilify('error', 'Faq Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Faq
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        try {
            $faq = Faq::where('id', $id)->first();
            if (!empty($faq)) {
                return view($this->pageLayout . 'edit', compact('faq'));
            } else {
                smilify('error', 'Edit Faq Not Found ⚡️');
                return redirect()->route('admin.faq.index');
            }
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Faq
    ---------------------------------------------------------------------------------- */
    public function update(Request $request, $id)
    {
        $customMessages = [
            'question.required'             => 'question is Required',
            'answer.required'       => 'answer is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'question'             => 'required',
            'answer'       => 'required',
            'status'            => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            Faq::where('id', $id)->update([
                'question'             => @$request->get('question'),
                'answer'  => @$request->get('answer'),
                'status'  => @$request->get('status')
            ]);
            smilify('success', 'Faq Updated Successfully ⚡️');
            return redirect()->route('admin.faq.index');
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Faq
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $faq = Faq::where('id', $id)->first();
            $faq->delete();
            smilify('success', 'Faq Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Faq Deleted Successfully..!'
            ]);
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Faq
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $faq = Faq::find($request->id);
        return view($this->pageLayout . 'show', compact('faq'));
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for Change Faq Status
    -------------------------------------------------------------------------------------------- */
    public function change_status(Request $request)
    {
        try {
            $faq = Faq::where('id', $request->id)->first();
            if (!empty($faq)) {
                if ($faq->status == "active") {
                    Faq::where('id', $request->id)->update([
                        'status' => "inactive",
                    ]);
                } else {
                    Faq::where('id', $request->id)->update([
                        'status' => "active",
                    ]);
                }
                smilify('success', 'Faq Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'Faq Status Updated Successfully..!'
                ]);
            } else {
                smilify('error', 'Faq Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'Faq Status Updated Successfully..!'
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
