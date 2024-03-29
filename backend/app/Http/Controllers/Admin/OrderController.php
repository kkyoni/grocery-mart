<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Facades\DataTables;
use App\Models\OrderProduct;
use Exception;
use PDF;

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

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ---------------------------------------------------------------------------------- */
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
        ])->ajax([
            'url' => route('admin.order.filter_by_button'),
            'type' => 'POST',
            'data' => 'function(d) {
                d._token = "' . csrf_token() . '";
                d.start_date = $("#start_date").val();
                d.end_date = $("#end_date").val();
            }',
        ])->parameters([
            'order' => [],
            'paging'      => true,
            'info'        => true,
            'searchDelay' => 350,
            'dom'         => 'lBfrtip',
            'buttons'     => [
                ['extend' => 'copy', 'title' => "Order Report", 'text' => '<i class="fa fa-copy" aria-hidden="true" style="font-size:16px"></i> Copy', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5]]],
                ['extend' => 'excel', 'title' => "Order Report", 'text' => '<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:16px"></i> Excel', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5]]],
                ['extend' => 'csv', 'title' => "Order Report", 'text' => '<i class="fa fa-file-text-o" aria-hidden="true" style="font-size:16px"></i> CSV', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5]]],
                ['extend' => 'pdf', 'title' => "Order Report", 'text' => '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:16px"></i> PDF', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5]]],
                ['extend' => 'print', 'title' => "Order Report", 'text' => '<i class="fa fa-print" aria-hidden="true" style="font-size:16px"></i> Print', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5]]],
            ],
            'searching'   => true,
        ]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Order
    ---------------------------------------------------------------------------------- */
    public function view($id)
    {
        try {
            $order = Order::with(['user_details', 'UserAddressDetails'])->where('id', $id)->first();
            $ProductOrder = OrderProduct::where('order_id', $id)->get();
            if (!empty($order)) {
                return view($this->pageLayout . 'view', compact('order', 'ProductOrder'));
            } else {
                smilify('error', 'Edit Order Not Found 🔥 !');
                return redirect()->route('admin.order.index');
            }
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Download PDF Invoice
    ---------------------------------------------------------------------------------- */
    public function downloadPdf($id)
    {
        try {
            $order = Order::with(['user_details', 'UserAddressDetails'])->where('id', $id)->first();
            $ProductOrder = OrderProduct::where('order_id', $id)->get();
            view()->share('Order', $order, 'ProductOrder', $ProductOrder);
            $pdf = PDF::loadView('admin.pages.order.order-pdf', ['order' => $order, 'ProductOrder' => $ProductOrder]);
            return $pdf->download('invoice.pdf');
        } catch (Exception $e) {
            echo $e;
        }
    }
}
