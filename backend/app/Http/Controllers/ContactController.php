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
use App\Models\Contact;

class ContactController extends Controller
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
        $this->pageLayout = 'pages.contact.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request){
        $contact = Contact::orderBy('id','desc');
        if (request()->ajax()) {
            return DataTables::of($contact->get())->addIndexColumn()
            ->editColumn('message', function (Contact $contact) {
                return Str::words($contact->message, 10,'....');
            })
            ->editColumn('action', function (Contact $contact) {
                $action  = '';
                $action .='<a class="btn btn-danger btn-circle btn-sm m-l-10 deletecontact ml-1 mr-1" data-id ="'.$contact->id.'" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showcontact" data-id="'.$contact->id.'" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                return $action;
            })
            ->rawColumns(['action','description','image','status'])
            ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
            ['data' => 'first_name', 'name' => 'first_name', 'title' => 'First Name','width'=>'3%'],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => 'Last Name','width'=>'3%'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email','width'=>'10%'],
            ['data' => 'message', 'name' => 'message', 'title' => 'Message','width'=>'15%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'10%',"orderable" => false, "searchable" => false],
        ])
        ->parameters([ 'order' =>[] ]);
        return view($this->pageLayout.'index',compact('html'));
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Contact
    ---------------------------------------------------------------------------------- */
    public function delete($id){
        try{
            $contact = Contact::where('id',$id)->first();
            $contact->delete();
            smilify('success', 'Contact Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Contact Deleted Successfully..!'
            ]);
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Contact
    ---------------------------------------------------------------------------------- */
    public function show(Request $request) {
        $contact = Contact::find($request->id);
        return view($this->pageLayout.'show',compact('contact'));
    }
}
