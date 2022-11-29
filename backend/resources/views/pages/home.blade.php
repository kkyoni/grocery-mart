@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('mainContent')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2><i class="fa fa-home" aria-hidden="true"></i> Dashboard</h2>
  </div>
</div>

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Setting_count bg-darken-2">
                            <i class="fa fa-cogs fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Setting_count white media-body">
                            <h3>Setting</h3>
                            <h5 class="text-bold-400 mb-0">{{$totalSetting}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ url('admin/settings') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Blog_count bg-darken-2">
                            <i class="fa fa-rss fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Blog_count white media-body">
                            <h3>Blog</h3>
                            <h5 class="text-bold-400 mb-0">{{$totalBlog}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ route('blog.index') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Cms_count bg-darken-2">
                            <i class="fa fa-file-text fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Cms_count white media-body">
                            <h3>Cms</h3>
                            <h5 class="text-bold-400 mb-0">{{$totalCms}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ route('cms.index') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Contact_count bg-darken-2">
                            <i class="fa fa-phone-square fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Contact_count white media-body">
                            <h3>Contact</h3>
                            <h5 class="text-bold-400 mb-0">{{$totalContact}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ route('contact.index') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-12 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Faq_count bg-darken-2">
                            <i class="fa fa-industry fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Faq_count white media-body">
                            <h3>Faq</h3>
                            <h5 class="text-bold-400 mb-0">{{$totalFaq}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ route('faq.index') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-12 mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-Slider_count bg-darken-2">
                            <i class="fa fa-sliders fa-3x icon_admin"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-Slider_count white media-body">
                            <h3>Slider</h3>
                            <h5 class="text-bold-400 mb-0">{{$totalSlider}}</h5>
                            <div class="media-left media-middle mt-1">
                                <a class="white" href="{{ route('slider.index') }}">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
@section('styles')
<style type="text/css">
.bg-Setting_count{background-color: #8803fc !important;}
.bg-gradient-x-Setting_count{background-image: linear-gradient(to right, #8803fc 0%, #cf9afe 100%); background-repeat: repeat-x;}
.bg-Blog_count {background-color: #FF5733!important;}
.bg-gradient-x-Blog_count {background-image: linear-gradient(to right, #FF5733 0%, #ed836b 100%); background-repeat: repeat-x;}
.bg-Cms_count {background-color: #10C888 !important;}
.bg-gradient-x-Cms_count {background-image: linear-gradient(to right, #10C888 0%, #5CE0B8 100%); background-repeat: repeat-x;}
.bg-Contact_count {background-color: #fcbe03!important;}
.bg-gradient-x-Contact_count {background-image: linear-gradient(to right, #fcbe03 0%, #fdd868 100%); background-repeat: repeat-x;}
.bg-Faq_count {background-color: #00A5A8 !important;}
.bg-gradient-x-Faq_count {background-image: linear-gradient(to right, #00A5A8 0%, #4DCBCD 100%); background-repeat: repeat-x;}
.bg-Slider_count {background-color: #FF6275 !important;}
.bg-gradient-x-Slider_count {background-image: linear-gradient(to right, #FF6275 0%, #FF9EAC 100%); background-repeat: repeat-x;}
h3{font-size: 13px;}
.wrapper-content{padding: 20px 10px 40px;}
.white{color:#FFF;}
.white:hover{color:#FFF;}
.card{color:#FFF!important; font-weight: 600!important; font-size: 1.14rem!important;}
.p-2 {padding: 1rem!important;}
#dynamic_data {margin: 2em auto;}
.fa-3x {font-size: 3em;}
</style>
@endsection
@section('scripts')
@endsection