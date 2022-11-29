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
use App\Models\Slider;

class SliderController extends Controller
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
        $this->pageLayout = 'pages.slider.';
        $this->middleware('auth');
    }
    /*-----------------------------------------------------------------------------------
    @Description: Function Index Page
    ---------------------------------------------------------------------------------- */
    public function index(Builder $builder, Request $request){
        $slider = Slider::orderBy('id','desc');
        if (request()->ajax()) {
            return DataTables::of($slider->get())->addIndexColumn()
            ->editColumn('title', function (Slider $slider) {
                return Str::words($slider->title, 10,'....');
            })
            ->editColumn('sub_title', function (Slider $slider) {
                return Str::words($slider->sub_title, 10,'....');
            })
            ->editColumn('description', function (Slider $slider) {
                return Str::words($slider->description, 10,'....');
            })
            ->editColumn('status', function (Slider $slider) {
                if ($slider->status == "active") {
                    return '<span class="label label-success">Active</span>';
                } else {
                    return '<span class="label label-danger">Block</span>';
                }
            })
            ->editColumn('image', function (Slider $slider){
                if(!$slider->image){
                    return '<img class="img-thumbnail" src="' . asset('storage/slider/default.png').'" width="60px">';
                }else{
                    return '<img class="img-thumbnail" src="' . asset('storage/slider' . '/' . $slider->image) . '" width="60px">';
                }
            })
            ->editColumn('action', function (Slider $slider) {
                $action  = '';
                $action .= '<a class="btn btn-warning btn-circle btn-sm" href='.route('slider.edit',[$slider->id]).'><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>';
                $action .='<a class="btn btn-danger btn-circle btn-sm m-l-10 deleteslider ml-1 mr-1" data-id ="'.$slider->id.'" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                $action .= '<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm Showslider" data-id="'.$slider->id.'" data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>';
                if($slider->status == "active"){
                    $action .= '<a href="javascript:void(0)" data-value="1" data-toggle="tooltip" title="Active" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="'.$slider->id.'" title="Active"><i class="fa fa-unlock"></i></a>';
                }else{
                    $action .= '<a href="javascript:void(0)" data-value="0" data-toggle="tooltip" title="Block" class="btn btn-dark btn-circle btn-sm ml-1 mr-1 changeStatusRecord" data-id="'.$slider->id.'" title="Block"><i class="fa fa-lock" ></i></a>';
                }
                return $action;
            })
            ->rawColumns(['action','title','sub_title','description','status','image'])
            ->make(true);
        }
        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title','width'=>'10%'],
            ['data' => 'image', 'name' => 'image', 'title' => 'Image','width'=>'10%'],
            ['data' => 'sub_title', 'name' => 'sub_title', 'title' => 'Sub Title','width'=>'10%'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description','width'=>'10%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status','width'=>'10%'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'10%',"orderable" => false, "searchable" => false],
        ])
        ->parameters([ 'order' =>[] ]);
        return view($this->pageLayout.'index',compact('html'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Slider
    ---------------------------------------------------------------------------------- */
    public function create(){
        return view($this->pageLayout.'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Slider
    ---------------------------------------------------------------------------------- */
    public function store(Request $request){
        $customMessages = [
            'title.required'             => 'Title is Required',
            'sub_title.required'         => 'Sub Title is Required',
            'description.required'       => 'description is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'title'              => 'required',
            'sub_title'          => 'required',
            'description'        => 'required',
            'status'             => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        } try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('slider', $file,$filename);
            }else{
                $filename = 'default.png';
            }
            $slider = Slider::create([
                'title'               => @$request->get('title'),
                'sub_title'           => @$request->get('sub_title'),
                'description'         => @$request->get('description'),
                'status'              => @$request->get('status'),
                'image'               => @$filename,
            ]);
            smilify('success', 'Slider Created Successfully ⚡️');
            return redirect()->route('slider.index');
        }catch(\Exception $e){
            smilify('error', 'Slider Not Created Successfully ⚡️');
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit slider
    ---------------------------------------------------------------------------------- */
    public function edit($id){
        try{
            $slider = Slider::where('id',$id)->first();
            if(!empty($slider)){
                return view($this->pageLayout.'edit',compact('slider'));
            }else{
                smilify('error', 'Edit Slider Not Found ⚡️');
                return redirect()->route('slider.index');
            }
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Slider
    ---------------------------------------------------------------------------------- */
    public function update(Request $request,$id){
        $customMessages = [
            'title.required'             => 'title is Required',
            'sub_title.required'         => 'sub title is Required',
            'description.required'       => 'description is Required',
            'status.required'            => 'status is Required',
        ];
        $validatedData = Validator::make($request->all(),[
            'title'             => 'required',
            'sub_title'         => 'required',
            'description'       => 'required',
            'status'            => 'required',
        ],$customMessages);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }try{
            $oldDetails = Slider::find($id);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('slider', $file,$filename);
            }else{
                if($oldDetails->image !== null){
                    $filename = $oldDetails->image;
                }else{
                    $filename = 'default.png';
                }
            }
            Slider::where('id',$id)->update([
                'title'             => @$request->get('title'),
                'sub_title'             => @$request->get('sub_title'),
                'description'  => @$request->get('description'),
                'status'  => @$request->get('status'),
                'image'             => @$filename
            ]);
            smilify('success', 'Slider Updated Successfully ⚡️');
            return redirect()->route('slider.index');
        } catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /* ----------------------------------------------------------------------------------
    @Description: Function for Delete Slider
    ---------------------------------------------------------------------------------- */
    public function delete($id){
        try{
            $slider = Slider::where('id',$id)->first();
            $slider->delete();
            smilify('success', 'Slider Deleted Successfully ⚡️');
            return response()->json([
                'status'    => 'success',
                'title'     => 'Success!!',
                'message'   => 'Slider Deleted Successfully..!'
            ]);
        }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for show Slider
    ---------------------------------------------------------------------------------- */
    public function show(Request $request) {
        $slider = Slider::find($request->id);
        return view($this->pageLayout.'show',compact('slider'));
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for Change Slider Status
    -------------------------------------------------------------------------------------------- */
    public function change_status(Request $request){
        try{
            $slider = Slider::where('id',$request->id)->first();
            if(!empty($slider)){
                if($slider->status == "active"){
                    Slider::where('id',$request->id)->update([
                        'status' => "inactive",
                    ]);
                }else{
                    Slider::where('id',$request->id)->update([
                        'status'=> "active",
                    ]);
                }
                smilify('success', 'Slider Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'Slider Status Updated Successfully..!'
                ]);
            }else{
                smilify('error', 'Slider Status Update Successfully ⚡️');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'Slider Status Updated Successfully..!'
                ]);
            }
        }catch (Exception $e){
            return response()->json([
                'status'    => 'error',
                'title'     => 'Error!!',
                'message'   => $e->getMessage()
            ]);
        }
    }
}