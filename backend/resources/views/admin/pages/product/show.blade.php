@extends('admin.layouts.app')
@section('title')
    Product Management
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-product-hunt" aria-hidden="true"></i> Show Product Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.product.index') }}">Product Table</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Product Show</strong></span>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="product-images">
                                        @foreach ($product->productimage as $value)
                                            <div>
                                                <div class="image-imitation" style="padding:0px">
                                                    <center>
                                                        <img src="{!! url('storage/product/' . @$value->image) !!}" alt="{{ $value->image }}"
                                                            class="img-circle">
                                                    </center>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h2 class="font-bold m-b-xs">
                                        {{ $product->name }}
                                    </h2>
                                    <small>Many desktop publishing packages and web page editors
                                        now.</small>
                                    <div class="m-t-md">
                                        <h2 class="product-main-price">₹ {{ $product->price }} <small
                                                class="text-muted">Exclude
                                                Tax</small> </h2>
                                    </div>
                                    <hr>
                                    <h4>Product description</h4>
                                    <div class="small text-muted">
                                        {{ $product->description }}
                                    </div>
                                    <dl class="small m-t-md">
                                        <dt>created_at</dt>
                                        <dd>{{ $product->created_at }}
                                        </dd>
                                        <dt>Euismod</dt>
                                        <dd>Vestibulum id ligula porta felis euismod semper eget
                                            lacinia odio sem nec elit.</dd>
                                        <dd>Donec id elit non mi porta gravida at eget metus.
                                        </dd>
                                        <dt>Malesuada porta</dt>
                                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                    </dl>
                                    <hr>
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
    <link href="{{ asset('assets/admin/css/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/slick/slick-theme.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/slick/slick.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.product-images').slick({
                dots: true
            });
        });
    </script>
@endsection
