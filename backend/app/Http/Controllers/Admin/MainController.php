<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Cms;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Setting;
use App\Models\SiteSetting;
use App\Models\Support;
use App\Models\User;
use Exception;

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
        $TotalSupport = Support::get();
        $TotalConatct = Contact::whereDate('created_at', '=', date('Y-m-d'))->get();
        $Ordercronlist = Order::whereDate('created_at', '>=', date('Y-m-d', strtotime("this week")))->whereDate('created_at', '<=', date('Y-m-d', strtotime("sunday 0 week")))->get();
        return view('admin.pages.dashboard', compact('TotalUser', 'TotalBlog', 'TotalCms', 'TotalFaq', 'TotalBrand', 'TotalCategories', 'TotalProduct', 'TotalPromo', 'TotalSetting', 'TotalOrder', 'Ordercronlist', 'TotalSupport', 'TotalConatct'));
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


    public function change_support(Request $request)
    {
        try {
            $support = Support::where('id', $request->id)->first();
            if (!empty($support)) {
                if ($support->flage == "unread") {
                    Support::where('id', $request->id)->update([
                        'flage' => "read",
                    ]);
                }
                smilify('success', 'Support Status Update Successfully 🔥 !');
                return response()->json([
                    'status'    => 'success',
                    'title'     => 'Success!!',
                    'message'   => 'Support Status Updated Successfully..!'
                ]);
            } else {
                smilify('error', 'Support Status Update Successfully 🔥 !');
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Error!!',
                    'message'   => 'Support Status Updated Successfully..!'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'    => 'error',
                'title'     => 'Error!!',
                'message'   => $e->getMessage()
            ]);
        }
    }
}
