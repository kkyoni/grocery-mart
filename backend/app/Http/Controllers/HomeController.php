<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Cms;
use App\Models\Faq;
use App\Models\Slider;
use App\Models\Contact;
use Carbon\Carbon;
use Response;

class HomeController extends Controller
{
   protected $authLayout = '';
    protected $pageLayout = 'pages.';
    /**
     * * * Create a new controller instance.
     * * *
     * * * @return void
     * * */
    public function __construct(){
        $this->authLayout = 'auth.';
        $this->pageLayout = 'pages.';
        $this->middleware('auth');
    }
    public function index(){
        $totalSetting = Setting::count();
        $totalBlog = Blog::count();
        $totalCms = Cms::count();
        $totalContact = Contact::count();
        $totalFaq = Faq::count();
        $totalSlider = Slider::count();
        return view('pages.home',compact('totalSetting','totalBlog','totalCms','totalContact','totalFaq','totalSlider'));
    }
}
