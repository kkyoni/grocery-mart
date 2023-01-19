<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Html\Builder;
use App\Models\Support;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SupportController extends Controller
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
        $this->pageLayout = 'admin.pages.support.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $support = Support::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($support->get())->addIndexColumn()
                ->editColumn('flage', function (Support $support) {
                    if ($support->flage === 'read') {
                        return '<span class="label label-primary">Read</span>';
                    } else {
                        return '<a href="javascript:void(0)" data-toggle="tooltip" title="Active" class="chnagesupport" data-id="' . $support->id . '"><span class="label label-danger">UnRead</span></a>';
                    }
                })
                ->editColumn('supportmessage', function (Support $support) {
                    return Str::words($support->supportmessage, 10, '....');
                })
                ->editColumn('action', function (Support $support) {
                    $action  = '';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showsupport" data-id="' . $support->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['flage', 'supportmessage', 'action'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'supportname', 'name' => 'supportname', 'title' => 'Name', 'width' => '10%'],
            ['data' => 'supportemail', 'name' => 'supportemail', 'title' => 'Email', 'width' => '10%'],
            ['data' => 'supportmessage', 'name' => 'supportmessage', 'title' => 'Message', 'width' => '10%'],
            ['data' => 'flage', 'name' => 'flage', 'title' => 'Status', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Support
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $support = Support::find($request->id);
        return view($this->pageLayout . 'show', compact('support'));
    }
}
