@extends('admin.layouts.app')
@section('title')
    Blog Management
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-rss" aria-hidden="true"></i> Show Blog Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.blog.index') }}">Blog Table</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud"><strong>Blog Show</strong></span>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Profile Detail</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            <center><img alt="image" class="img-fluid"
                                    src="http://webapplayers.com/inspinia_admin-v2.9.4/img/p1.jpg"></center>
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong>{{ $blog->title }}</strong></h4>
                            <h5>
                                About me
                            </h5>
                            <p>
                                {{ $blog->description }}
                            </p>
                            <div class="row m-t-lg text-center">
                                <div class="col-md-4">
                                    <span class="bar"><strong>1</strong></span>
                                    <h5> Posts</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="line"><strong>{{ $newcomment }}</strong> </span>
                                    <h5>New Comment</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="bar"><strong>{{ $totalcomment }}</strong></span>
                                    <h5> Total Comment</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Activites</h5>
                    </div>
                    <div class="ibox-content">

                        <div>
                            <div class="feed-activity-list">
                                {{-- @foreach ($blog->Comment as $key => $valueComment)
                                    @foreach ($valueComment->UserDetails as $valueUserDetails)
                                        <div class="feed-element">
                                            <a href="#" class="float-left">
                                                <img alt="image" class="rounded-circle"
                                                    src="http://webapplayers.com/inspinia_admin-v2.9.4/img/p1.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="float-right text-navy">1m ago</small>
                                                <strong>{{$valueUserDetails->first_name}}</strong> started @if ($valueComment->status == 'unread') <font color="red">New</font> @else @endif Comment <strong>Admin</strong>.
                                                <br>
                                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                                <div class="actions">
                                                    {{$valueComment->comment}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach --}}
                                {{ csrf_field() }}
                                <div id="post_data"></div>

                                <div class="feed-element">
                                    <div class="media-body ">
                                        <textarea class="well" rows="4" cols="148" placeholder="Describe yourself here..."></textarea>
                                        <div class="float-right">
                                            <a href="" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>
                                                Message</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="buttonoutput"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var _token = $('input[name="_token"]').val();
            load_data('', _token);

            function load_data(id = "", _token) {
                $.ajax({
                    url: "{{ route('admin.blog.load_data') }}",
                    method: "POST",
                    data: {
                        id: id,
                        blog_id: 4,
                        _token: _token
                    },
                    success: function(data) {
                        console.log("data", data);
                        $('#load_more_button').remove();
                        $('#post_data').append(data.output);
                        $('#buttonoutput').append(data.buttonoutput);
                    }
                })
            }
            $(document).on('click', '#load_more_button', function() {
                var id = $(this).data('id');
                $('#load_more_button').html('<b>Loading...</b>');
                load_data(id, _token);
            });
        });
    </script>
@endsection
