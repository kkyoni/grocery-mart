<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Cms;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Setting;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\UserAddress;
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
        $TotalUser = User::where('user_type', 'user')->count();
        $TotalBlog = Blog::count();
        $TotalCms = Cms::count();
        $TotalFaq = Faq::count();
        $TotalBrand = Brand::count();
        $TotalCategories = Categories::count();
        $TotalProduct = Product::count();
        $TotalPromo = Promo::count();
        $TotalSetting = Setting::count();
        $TotalOrder = Order::count();
        return view('admin.pages.dashboard', compact('TotalUser', 'TotalBlog', 'TotalCms', 'TotalFaq', 'TotalBrand', 'TotalCategories', 'TotalProduct', 'TotalPromo', 'TotalSetting', 'TotalOrder'));
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

