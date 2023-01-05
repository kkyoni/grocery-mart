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
use App\Models\Promo;
use App\Models\PromoUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Jobs\PromoCodeJob;
use Illuminate\Support\Facades\Mail;

class PromoController extends Controller
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
        $this->pageLayout = 'admin.pages.promo.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request)
    {
        $promo = Promo::orderBy('id', 'desc')->groupBy('code');
        if (request()->ajax()) {
            return DataTables::of($promo->get())->addIndexColumn()
                ->editColumn('user_id', function (Promo $promo) {
                    $promos = array();
                    $promoname = '';
                    $allpromo = PromoUser::where('promo_id', $promo->id)->get();
                    if (!empty($allpromo)) {
                        foreach ($allpromo as $code) {
                            $promoname = User::where('id', $code->user_id)->first()->email;
                            array_push($promos, $promoname);
                        }
                    }
                    return "<span class='badge badge-success'>" . implode("</span> <span class='badge badge-success'>", $promos) . "</span>";
                })
                ->editColumn('start_date', function (Promo $promo) {
                    return $promo->start_date;
                })
                ->editColumn('end_date', function (Promo $promo) {
                    return $promo->end_date;
                })
                ->editColumn('action', function (Promo $promo) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.promo.edit', [$promo->id]) . '><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deletepromo ml-1 mr-1" data-id ="' . $promo->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showpromo" data-id="' . $promo->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'start_date', 'end_date', 'user_id'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'code', 'name' => 'code', 'title' => 'Code', 'width' => '10%'],
            ['data' => 'user_id', 'name' => 'user_id', 'title' => 'User', 'width' => '10%'],
            ['data' => 'start_date', 'name' => 'start_date', 'title' => 'Start Date', 'width' => '10%'],
            ['data' => 'end_date', 'name' => 'end_date', 'title' => 'End Date', 'width' => '10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '10%', "orderable" => false, "searchable" => false],
        ])
            ->parameters(['order' => []]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Promo
    ---------------------------------------------------------------------------------- */
    public function create()
    {
        $promo_list = array();
        $user_list = User::where('user_type', 'user')->pluck('email', 'id');
        return view($this->pageLayout . 'create', compact('user_list', 'promo_list'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Promo
    ---------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $customMessages = [
            'code.required'       => 'Code is required',
            'code.unique'         => 'Code is unique',
            'user_id.required'     => 'User is Required',
            'start_date.required'  => 'Start Date is Required',
            'end_date.required'    => 'End Date is Required',
            'status.required'      => 'Status is Required',
            'discount.required'    => 'Discount is Required',
            'description.required'    => 'Description is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'code'    => 'required|unique:promo,code,NULL,id,deleted_at,NULL',
            'user_id'    => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',
            'status'     => 'required',
            'discount'   => 'required',
            'description'   => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            if ($request->hasFile('promocodeimages')) {
                $file = $request->file('promocodeimages');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('promocode', $file, $filename);
            } else {
                $filename = 'default.png';
            }
            $promo = Promo::create([
                'code'            => @$request->get('code'),
                'start_date'      => @$request->get('start_date'),
                'end_date'        => @$request->get('end_date'),
                'status'          => @$request->get('status'),
                'discount'        => @$request->get('discount'),
                'description'     => @$request->get('description'),
                'promocodeimages' => @$filename,
            ]);
            foreach ($request->get('user_id') as $val) {
                PromoUser::create([
                    'user_id'     => @$val,
                    'promo_id'     => @$promo->id,
                ]);
                $UserEmail = User::where('id', $val)->first();
                $details = [
                    'subject' => 'Promo Code',
                    'email' => $request->email,
                    'discount' => $request->discount,
                    'username' => $UserEmail->first_name . ' ' . $UserEmail->last_name,
                    'description' => $request->description,
                    'code' => $request->code,
                    'expires' => $request->end_date,
                    'images' => $filename,
                ];
                Mail::to($UserEmail->email)->send(new \App\Mail\PromoCodeMail($details));
            }
            smilify('success', 'Promo Created Successfully ⚡️');
            return redirect()->route('admin.promo.index');
        } catch (\Exception $e) {
            smilify('error', 'Promo Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Promo
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        try {
            $promo_list = PromoUser::where('promo_id', $id)->pluck('user_id', 'id');
            $user_list = User::where('user_type', 'user')->pluck('email', 'id');
            $promo = Promo::where('id', $id)->first();
            if (!empty($promo)) {
                return view($this->pageLayout . 'edit', compact('promo', 'user_list', 'promo_list'));
            } else {
                smilify('error', 'Edit Promo Not Found ⚡️');
                return redirect()->route('admin.promo.index');
            }
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    public function update($id, Request $request)
    {
        $customMessages = [
            'code.required'        => 'Code is required',
            'code.unique'          => 'Code is unique',
            'user_id.required'     => 'User is Required',
            'start_date.required'  => 'Start Date is Required',
            'end_date.required'    => 'End Date is Required',
            'status.required'      => 'Status is Required',
            'discount.required'    => 'Discount is Required',
            'description.required' => 'Description is Required',
        ];
        $validatedData = Validator::make($request->all(), [
            'code'       => 'required|unique:promo,code,' . $id . ',id,deleted_at,NULL',
            'user_id'    => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',
            'status'     => 'required',
            'discount'   => 'required',
            'description'   => 'required',
        ], $customMessages);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $oldDetails = Promo::find($id);
            if ($request->hasFile('promocodeimages')) {
                $file = $request->file('promocodeimages');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('promocode', $file, $filename);
            } else {
                if ($oldDetails->promocodeimages !== null) {
                    $filename = $oldDetails->promocodeimages;
                } else {
                    $filename = 'default.png';
                }
            }
            $promo = Promo::where('id', $id)->update([
                'code'            => @$request->get('code'),
                'start_date'      => @$request->get('start_date'),
                'end_date'        => @$request->get('end_date'),
                'status'          => @$request->get('status'),
                'discount'        => @$request->get('discount'),
                'description'     => @$request->get('description'),
                'promocodeimages' => @$filename,
            ]);
            $images = PromoUser::where('promo_id', $id)->get();
            $images->each(function ($val, $key) {
                $filePath = $val->promo_id;
                $val->delete($filePath);
            });
            foreach ($request->get('user_id') as $val) {
                PromoUser::create([
                    'user_id'     => @$val,
                    'promo_id'     => @$id,
                ]);
            }
            smilify('success', 'Promo Updated Successfully ⚡️');
            return redirect()->route('admin.promo.index');
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }
    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Promo
    ---------------------------------------------------------------------------------- */
    public function delete($id)
    {
        try {
            $promo = Promo::where('id', $id)->first();
            $promo->delete();
            smilify('success', 'Promo Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Promo Deleted Successfully..!'
            ]);
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Promo
    ---------------------------------------------------------------------------------- */
    public function show(Request $request)
    {
        $promo = Promo::where('id', $request->id)->first();
        $promo_details = PromoUser::with(['UserDetails'])->where('promo_id', $request->id)->get();
        return view($this->pageLayout . 'show', compact('promo', 'promo_details'));
    }
}
