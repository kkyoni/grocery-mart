<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Contact;
use Exception;
class ContactController extends Controller
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
        $this->pageLayout = 'admin.pages.contact.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $contact = Contact::orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($contact->get())->addIndexColumn()
                ->editColumn('message', function (Contact $contact) {
                    return Str::words($contact->message, 10, '....');
                })
                ->editColumn('action', function (Contact $contact) {
                    $action  = '';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deletecontact ml-1 mr-1" data-id ="' . $contact->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showcontact" data-id="' . $contact->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'description', 'image', 'status'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'first_name', 'name' => 'first_name', 'title' => 'First Name', 'width' => '3%'],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => 'Last Name', 'width' => '3%'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email', 'width' => '10%'],
            ['data' => 'message', 'name' => 'message', 'title' => 'Message', 'width' => '15%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])->parameters([
            'order' => [],
            'paging'      => true,
            'info'        => true,
            'searchDelay' => 350,
            'dom'         => 'lBfrtip',
            'buttons'     => [
                ['extend' => 'copy', 'title' => "Conatct Report", 'text' => '<i class="fa fa-copy" aria-hidden="true" style="font-size:16px"></i> Copy', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'excel', 'title' => "Conatct Report", 'text' => '<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:16px"></i> Excel', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'csv', 'title' => "Conatct Report", 'text' => '<i class="fa fa-file-text-o" aria-hidden="true" style="font-size:16px"></i> CSV', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'pdf', 'title' => "Conatct Report", 'text' => '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:16px"></i> PDF', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'print', 'title' => "Conatct Report", 'text' => '<i class="fa fa-print" aria-hidden="true" style="font-size:16px"></i> Print', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
            ],
            'searching'   => true,
        ]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Contact
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $contact = Contact::where('id', $id)->first();
            $contact->delete();
            smilify('success', 'Contact Deleted Successfully 🔥 !');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Contact Deleted Successfully..!'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Contact
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $contact = Contact::find($request->id);
        return view($this->pageLayout . 'show', compact('contact'));
    }
}
