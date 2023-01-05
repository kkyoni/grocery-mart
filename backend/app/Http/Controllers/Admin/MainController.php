<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Response;

class MainController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = 'admin.pages.';
    /**
     * * * * Create a new controller instance.
     * * * *
     * * * * @return void
     * * * */
    public function __construct()
    {
        $this->authLayout = 'admin.auth.';
        $this->pageLayout = 'admin.pages.';
        $this->middleware('auth');
    }

    /*------------------------------------------------------------------------------------
    @Description: Function Index Page
    ----------------------------------------------------------------------------------- */
    public function index()
    {
        return view('front.auth.login');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function Dashboard Page
    ----------------------------------------------------------------------------------- */
    public function dashboard()
    {
        $totalSetting = Setting::count();
        return view('admin.pages.dashboard', compact('totalSetting'));
    }

    public function maintenancemode_down()
    {
        $id = "1";
        $data = ['meta_value' => "1"];
        SiteSetting::where('id', $id)->update($data);
        return redirect()->route('admin.dashboard');
    }
    /* -----------------------------------------------------------------------------------------
    @Description: Function for Site Maintenance Mode Start
    @input:
    @Output: Site Maintenance Mode Start
    -------------------------------------------------------------------------------------------- */
    public function maintenancemode_up()
    {
        $id = "1";
        $data = ['meta_value'  => "0"];
        SiteSetting::where('id', $id)->update($data);
        return redirect()->route('admin.dashboard');
    }
}
