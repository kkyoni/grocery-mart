<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\ChatMessage;
use App\Models\LogActivity;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Dompdf\Css\Style;

class UsersController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     * * * * Create a new controller instance.
     * * * *
     * * * * @return void
     * * * */
    public function __construct()
    {
        $this->authLayout = 'admin.auth.';
        $this->pageLayout = 'admin.pages.user.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For View
    ------------------------------------------------------------------------------------*/
    public function index(Builder $builder, Request $request)
    {
        $user = User::where('user_type', 'user')->orderBy('id', 'desc');
        if (request()->ajax()) {
            return DataTables::of($user->get())->addIndexColumn()
                ->editColumn('avatar', function (User $user) {
                    if (!$user->avatar) {
                        return '<img class="img-thumbnail" src="' . asset('storage/avatar/default.png') . '" width="50px" height="50px">';
                    } else {
                        return '<img class="img-thumbnail" src="' . asset('storage/avatar' . '/' . $user->avatar) . '" width="50px" height="50px">';
                    }
                })
                ->editColumn('status', function (User $user) {
                    if ($user->status == 'active') {
                        return '<a href="javascript:void(0)" data-toggle="tooltip" title="Active" class="changeStatusRecord" data-id="' . $user->id . '"><span class="label label-primary">Active</span></a>';
                    } else {
                        return '<a href="javascript:void(0)" data-toggle="tooltip" title="InActive" class="changeStatusRecord" data-id="' . $user->id . '"><span class="label label-danger">InActive</span></a>';
                    }
                })
                ->editColumn('password', function (User $user) {
                    return '<input type="password" value="' . $user->twopassword . '" id="myInput' . $user->id . '" disabled><a href="javascript:void(0)" class="btn btn-default btn-sm myFunction" data-id="' . $user->id . '"><i class="fa fa-eye"></i></a>';
                })
                ->editColumn('name', function (User $user) {
                    return $user->first_name . ' ' . $user->last_name;
                })
                ->editColumn('action', function (User $user) {
                    $action  = '';
                    $action .= '<a class="btn btn-warning btn-circle btn-sm" href=' . route('admin.user.edit', [$user->id]) . '  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>';
                    $action .= '<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteuser ml-1 mr-1" data-id ="' . $user->id . '" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ShowUser" data-id="' . $user->id . '" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                    $action .= '<a class="btn btn-success btn-circle btn-sm ml-1" href=' . route('admin.user.activity_log', [$user->id]) . '  data-toggle="tooltip" title="Activity Log"><i class="fa fa-tasks"></i></a>';
                    $action .= '<a href="javascript:void(0)" class="btn btn-circle btn-sm ml-1 startChat" data-user-id="' . $user->id . '" data-toggle="tooltip" title="Chat" style="background-color:#5cb85c;border-color:#4cae4c;color:#FFF"><i class="fa fa-comments-o"></i></a>';
                    return $action;
                })
                ->rawColumns(['status', 'action', 'avatar', 'name', 'password'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no', 'width' => '2px'],
            ['data' => 'avatar', 'name' => 'avatar', 'title' => 'Avatar', 'width' => '5px'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'width' => '5px'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email', 'width' => '5px'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status', 'width' => '2px'],
            // ['data' => 'password', 'name' => 'password', 'title' => 'Password', 'width' => '5px'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'width' => '15%', "orderable" => false, "searchable" => false],
        ])->parameters([
            'order' => [],
            'paging'      => true,
            'info'        => true,
            'searchDelay' => 350,
            'dom'         => 'lBfrtip',
            'buttons'     => [
                ['extend' => 'copy', 'title' => "Users Report", 'text' => '<i class="fa fa-copy" aria-hidden="true" style="font-size:16px"></i> Copy', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'excel', 'title' => "Users Report", 'text' => '<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:16px"></i> Excel', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'csv', 'title' => "Users Report", 'text' => '<i class="fa fa-file-text-o" aria-hidden="true" style="font-size:16px"></i> CSV', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'pdf', 'title' => "Users Report", 'text' => '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:16px"></i> PDF', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
                ['extend' => 'print', 'title' => "Users Report", 'text' => '<i class="fa fa-print" aria-hidden="true" style="font-size:16px"></i> Print', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4]]],
            ],
            'searching'   => true,
        ]);
        return view($this->pageLayout . 'index', compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For User Chating Record
    ------------------------------------------------------------------------------------*/
    public function renderConversationList(Request $request)
    {
        $conversationList = ChatMessage::where('to_user_id', $request->get('getUserSendToId'))
            ->orWhere('from_user_id', $request->get('getUserSendToId'))
            ->get();
        $SecondUser = User::where('id', $request->get('getUserSendToId'))->first();
        $view = view("admin.pages.user.conversationList", compact('conversationList', 'SecondUser'))->render();
        return response()->json(['html' => $view]);
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function For Send User Chat
    ------------------------------------------------------------------------------------*/
    public function sendMessage(Request $request)
    {
        try {
            $getSentToID = $request->get('getUserSendToId');
            $message = $request->get('message');
            ChatMessage::create([
                'to_user_id'    => $getSentToID,
                'from_user_id'  => Auth::user()->id,
                'chat_message'  => $message,
            ]);
            return response()->json([
                'status'    => 'success',
                'message'   => 'Message Sent Successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'    => 'error',
                'message'   => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create User
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        return view($this->pageLayout . 'create');
    }


    /*-----------------------------------------------------------------------------------
    @Description: Function for Store User
    ------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email'    => 'required|unique:users,email',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|min:8',
            'status' => 'required',
        ], [
            'first_name' => 'The First Name field is required.',
            'last_name' => 'The Last Namefield is required.',
            'email' => 'The Email field is required.',
            'status' => 'The Status field is required.',
            'password.required'              => 'The new password field is required.',
            'password_confirmation.required' => 'The confirm password field is required.'
        ]);
        $validatedData->after(function () use ($validatedData, $request) {
            if ($request->get('password') !== $request->get('password_confirmation')) {
                $validatedData->errors()->add('password_confirmation', 'The Confirm Password does not match.');
            }
        });
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            User::create([
                'first_name' => @$request->get('first_name'),
                'last_name' => @$request->get('last_name'),
                'email' => @$request->get('email'),
                'password' => Hash::make($request->get('password')),
                'twopassword' => $request->get('password'),
                'status' => @$request->get('status'),
                'user_type' => 'user'
            ]);
            smilify('success', 'User Created Successfully 🔥 !');
            return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit User
    ------------------------------------------------------------------------------------*/
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            return view($this->pageLayout . 'edit', compact('user'));
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update User
    ------------------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'    => 'required|unique:users,email,' . Auth::user()->id,
            'status' => 'required',
        ]);
        try {
            User::where('id', $id)->update([
                'first_name' => @$request->get('first_name'),
                'last_name' => @$request->get('last_name'),
                'email' => @$request->get('email'),
                'status' => @$request->get('status'),
                'user_type' => 'user'
            ]);
            smilify('success', 'User Updated Successfully 🔥 !');
            return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete User
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->delete();
            smilify('success', 'User Deleted Successfully 🔥 !');
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'User Deleted Successfully..!']);
        } catch (Exception $e) {
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show User
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Change Status User
    ------------------------------------------------------------------------------------*/
    public function change_status(Request $request)
    {
        try {
            $user = User::where('id', $request->id)->first();
            if ($user->status == "active") {
                User::where('id', $request->id)->update(['status' => "inactive"]);
            } else {
                User::where('id', $request->id)->update(['status' => "active"]);
            }
            smilify('success', 'User Status Updated Successfully 🔥 !');
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'User Status Updated Successfully..!']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'title' => 'Error!!', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Get profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfile()
    {
        $user = User::where(['status' => 'active', 'id' => Auth::user()->id])->first();
        if (empty($user)) {
            return redirect()->to('admin/dashboard');
        }
        return view($this->pageLayout . 'updateprofile', compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfileDetail(Request $request)
    {
        $validatedData = $request->validate([
            'email'    => 'required|unique:users,email,' . Auth::user()->id,
            'name'    => 'required',
            'avatar'   => 'sometimes|mimes:jpeg,jpg,png'
        ]);
        try {
            $allowedfileExtension = ['pdf', 'jpg', 'png'];
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('avatar', $file, $filename);
            } else {
                $userDetail = User::where('id', Auth::user()->id)->first()->avatar;
                $filename = $userDetail;
            }
            User::where('id', Auth::user()->id)->update([
                'avatar'         => $filename,
                'email'          => $request->email,
                'name'          => $request->name,
            ]);
            smilify('success', 'User Profile Update Successfully 🔥 !');
            return redirect()->back();
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for update Password
    ---------------------------------------------------------------------------------- */
    public function updatePassword(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'old_password'          => 'required',
                'password'              => 'required|min:6',
                'password_confirmation' => 'required|min:6',
            ], [
                'old_password.required'          => 'The current password field is required.',
                'password.required'              => 'The new password field is required.',
                'password_confirmation.required' => 'The confirm password field is required.'
            ]);
            $validatedData->after(function () use ($validatedData, $request) {
                if ($request->get('password') !== $request->get('password_confirmation')) {
                    $validatedData->errors()->add('password_confirmation', 'The Confirm Password does not match.');
                }
            });
            if ($validatedData->fails()) {
                return redirect()->back()->withErrors($validatedData)->withInput();
            }
            if (Hash::check($request->get('old_password'), auth()->user()->password) === false) {
                return redirect()->back();
            }
            $user = auth()->user();
            $user->twopassword = $request->get('password');
            $user->password = Hash::make($request->get('password'));
            $user->save();
            smilify('success', 'User Password Update Successfully 🔥 !');
            return redirect()->back();
        } catch (Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for User Activity Log
    ---------------------------------------------------------------------------------- */
    public function activitylog(Builder $builder, Request $request)
    {
        if (!empty($request->id)) {
            $logactivity = LogActivity::where('user_id', $request->id)->orderBy('id', 'desc');
        } else {
            $logactivity = LogActivity::orderBy('id', 'desc');
        }

        if (request()->ajax()) {
            return DataTables::of($logactivity->get())->addIndexColumn()
                ->editColumn('status', function (LogActivity $logactivity) {
                    if ($logactivity->status == 'success') {
                        return  '<span class="label label-primary"><i class="fa fa-check"></i> Completed</span>';
                    } else {
                        return '<span class="label label-danger"><i class="fa fa-times"></i> Error</span>';
                    }
                })
                ->editColumn('url', function (LogActivity $logactivity) {
                    return '<p class="text-success">' . $logactivity->url . '</p>';
                })
                ->editColumn('method', function (LogActivity $logactivity) {
                    return '<label class="label label-info">' . $logactivity->method . '</label>';
                })
                ->editColumn('ip', function (LogActivity $logactivity) {
                    return '<p class="text-warning">' . $logactivity->ip . '</p>';
                })
                ->editColumn('agent', function (LogActivity $logactivity) {
                    return '<p class="text-danger">' . $logactivity->agent . '</p>';
                })
                ->editColumn('created_at', function (LogActivity $logactivity) {
                    return $logactivity->created_at->format('y-m-d');
                })
                ->rawColumns(['status', 'url', 'method', 'ip', 'agent', 'created_at'])
                ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'NO', 'width' => '5%', "orderable" => false, "searchable" => false],
            ['data' => 'subject', 'name' => 'subject', 'title' => 'Subject', 'width' => '10%'],
            ['data' => 'url', 'name' => 'url', 'title' => 'Url', 'width' => '10%'],
            ['data' => 'method', 'name' => 'method', 'title' => 'Method', 'width' => '10%'],
            ['data' => 'ip', 'name' => 'ip', 'title' => 'IP', 'width' => '10%'],
            ['data' => 'agent', 'name' => 'agent', 'title' => 'Agent', 'width' => '10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status', 'width' => '10%'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date', 'width' => '10%'],
        ])->parameters([
            'order' => [],
            'paging'      => true,
            'info'        => true,
            'searchDelay' => 350,
            'dom'         => 'lBfrtip',
            'buttons'     => [
                ['extend' => 'copy', 'title' => "Activity_Log Report", 'text' => '<i class="fa fa-copy" aria-hidden="true" style="font-size:16px"></i> Copy', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5, 6]]],
                ['extend' => 'excel', 'title' => "Activity_Log Report", 'text' => '<i class="fa fa-file-excel-o" aria-hidden="true" style="font-size:16px"></i> Excel', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5, 6]]],
                ['extend' => 'csv', 'title' => "Activity_Log Report", 'text' => '<i class="fa fa-file-text-o" aria-hidden="true" style="font-size:16px"></i> CSV', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5, 6]]],
                ['extend' => 'pdf', 'title' => "Activity_Log Report", 'text' => '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:16px"></i> PDF', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5, 6]]],
                ['extend' => 'print', 'title' => "Activity_Log Report", 'text' => '<i class="fa fa-print" aria-hidden="true" style="font-size:16px"></i> Print', 'exportOptions' => ['columns' => [0, 1, 2, 3, 4, 5, 6]]],
            ],
            'searching'   => true,
        ]);
        return view($this->pageLayout . 'ActivityLog', compact('html'));
    }
}
