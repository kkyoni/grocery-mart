<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
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
use App\Models\OrderProduct;
use App\Models\Promo;
use App\Models\PromoUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;
use View;

class OrderController extends Controller
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
        $this->pageLayout = 'admin.pages.order.';
        $this->middleware('auth');
    }

    public function index(Builder $builder, Request $request)
    {
        $order = Order::orderBy('id', 'desc');
        if (isset($request->start_date) || isset($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $order->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date);
        }
        if (request()->ajax()) {
            return DataTables::of($order->get())->addIndexColumn()
                ->editColumn('status', function (Order $order) {
                    if ($order->status == 'processing') {
                        return '<div class="project-completion">
                                <small>Completion with: 25% Processing</small>
                                <div class="progress progress-mini">
                                <div style="width: 25%;" class="progress-bar"></div>
                                </div>
                                </div>';
                    } elseif ($order->status == 'accepted') {
                        return '<div class="project-completion">
                                <small>Completion with: 50% Accepted</small>
                                <div class="progress progress-mini">
                                <div style="width: 50%;" class="progress-bar"></div>
                                </div>
                                </div>';
                    } elseif ($order->status == 'ontheway') {
                        return '<div class="project-completion">
                                <small>Completion with: 75% On The Way</small>
                                <div class="progress progress-mini">
                                <div style="width: 75%;" class="progress-bar"></div>
                                </div>
                                </div>';
                    } elseif ($order->status == 'delivered') {
                        return '<div class="project-completion">
                                <small>Completion with: 100% Delivered</small>
                                <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar"></div>
                                </div>
                                </div>';
                    } else {
                        return '<div class="project-completion">
                                <small>Completion with: 0% Cancelled</small>
                                <div class="progress progress-mini">
                                <div style="width: 100%;background-color:red" class="progress-bar"></div>
                                </div>
                                </div>';
                    }
                    // return  $order->status;
                })
                ->editColumn('user_email', function (Order $order) {
                    return  $order->user_details->email;
                })
                ->editColumn('action', function (Order $order) {
                    $action  = '';
                    $action .= '<a class="btn btn-primary btn-circle btn-sm" href=' . route('admin.order.view', [$order->id]) . '><i class="fa fa-eye" data-toggle="tooltip" title="View"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'user_email', 'status'])
                ->make(true);
        }

        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'invoice', 'name' => 'invoice', 'title' => 'Invoice', 'width' => '10%', "searchable" => true],
            ['data' => 'user_email', 'name' => 'user_email', 'title' => 'Custome Email', 'width' => '10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status', 'width' => '10%'],
            ['data' => 'payment_mode', 'name' => 'payment_mode', 'title' => 'Payment Mode', 'width' => '10%'],
            ['data' => 'grandtotal', 'name' => 'grandtotal', 'title' => 'Total', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->ajax([
                'url' => route('admin.order.filter_by_button'),
                'type' => 'POST',
                'data' => 'function(d) {
                d._token = "' . csrf_token() . '";
                d.start_date = $("#start_date").val();
                d.end_date = $("#end_date").val();
            }',
            ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Promo
    ---------------------------------------------------------------------------------- */
    public function view($id)
    {
        try {
            $order = Order::with(['user_details', 'UserAddressDetails'])->where('id', $id)->first();
            $ProductOrder = OrderProduct::where('order_id', $id)->get();
            if (!empty($order)) {
                return view($this->pageLayout . 'view', compact('order', 'ProductOrder'));
            } else {
                smilify('error', 'Edit Order Not Found ⚡️');
                return redirect()->route('admin.order.index');
            }
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }
}