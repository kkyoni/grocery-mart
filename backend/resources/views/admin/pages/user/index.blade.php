@extends('admin.layouts.app')
@section('title')
    Users Management
@endsection
@section('mainContent')
    <div class="row wrapper border-bottom white-bg page-heading mb-5">
        <div class="col-lg-12">
            <h2><i class="fa fa-users" aria-hidden="true"></i> Users Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <span class="label label-success float-right all_backgroud">Users Table</span>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary btn-sm pull-right mb-3 op-btn them"
                                href="{{ route('admin.user.create') }}"><i class="fa fa-plus"></i> Add Users</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                {!! $html->table(['class' => 'table table-striped table-bordered dt-responsive'], true) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left" id="exampleModalLabel1">User Management Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body testdata">
                    <h3>Modal Body</h3>
                </div>
            </div>
        </div>
    </div>



    <div id="chatContainer" style="display: none">
        <div class="jaymin" style="bottom: 20px;right: 75px;width: 230px;height: 320px;border-radius: 4px">
            <div class="heading" draggable="true"
                style="background: #2f4050;padding: 8px 15px;font-weight: bold;color: #fff;">
                {{ Settings::get('application_title') }} Chat
            </div>
            <div id="conversation" class="content">
            </div>
        </div>
        <div id="messageTextBtn">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="form-chat" style="padding: 10px 10px;">
                            <input id="sendToID" name="sendToID" type="hidden">
                            <div class="input-group input-group-sm">
                                <input id="message" type="text" class="form-control"
                                    placeholder="Enter message here . . .">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary sendMessage" type="button">Send</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title">Start Conversation</div>
    </div>
@endsection
@section('styles')
    <style>
        #chatContainer {
            width: 250px;
            height: 40px;
            position: fixed;
            right: 75px;
            bottom: 50px;
            z-index: 9999;
            background-color: #fff;
            box-shadow: 1px 2px 5px black;
            cursor: pointer;
        }

        #chatContainer .title {
            position: absolute;
            bottom: 0;
            border-top: 0px solid black;
            height: 40px;
            width: 100%;
            padding: 10px;
            display: block;
            left: 0;
            right: 0;
            background-color: lightgray;
            font-weight: 800;
        }

        #conversation {
            display: none;
            width: 100%;
            height: 220px;
            border: 0px solid #171717;
            position: absolute;
            top: 40px;
            z-index: 2;
            padding: 10px;
            overflow-y: scroll;
            overflow-x: hidden;
            left: 0;
            right: 0;
            margin: 0;
        }

        #messageTextBtn {
            display: none;
            position: absolute;
            width: 100%;
            bottom: 40px;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('new/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('new/buttons.dataTables.min.css') }}" />
@endsection
@section('scripts')
<script src="{{ asset('new/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    {!! $html->scripts() !!}
    <script>
        $(document).on("click", "a.deleteuser", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e69a2a",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('admin.user.delete', ['']) }}" + "/" + id,
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(msg) {
                            if (msg.status == 'success') {
                                swal({
                                        title: "Deleted",
                                        text: "Delete Record success",
                                        type: "success"
                                    },
                                    function() {
                                        location.reload();
                                    });
                            } else {
                                swal("Warning!", msg.message, "warning");
                            }
                        },
                        error: function() {
                            swal("Error!", 'Error in delete Record', "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Your Users is safe :)", "error");
                }
            });
            return false;
        })

        $(document).on("click", "a.ShowUser", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('admin.user.show') }}",
                type: 'get',
                data: {
                    id: id
                },
                success: function(msg) {
                    $('.testdata').html(msg);
                    $('#basicModal').modal('show');
                },
                error: function() {
                    swal("Error!", 'Error in Record Not Show', "error");
                }
            });
        });
        $(document).on("click", ".changeStatusRecord", function(e) {
            var row = $(this);
            var id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "You want's to update this record status ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e69a2a",
                confirmButtonText: "Yes, updated it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('admin.user.change_status', 'replaceid') }}",
                        type: 'post',
                        data: {
                            "_method": 'post',
                            'id': id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(msg) {
                            if (msg.status == 'success') {
                                swal({
                                        title: "Status",
                                        text: "Status Success Update",
                                        type: "success"
                                    },
                                    function() {
                                        location.reload();
                                    });
                            } else {
                                swal("Warning!", msg.message, "warning");
                            }
                        },
                        error: function() {
                            swal("Error!", 'Error in Status Record', "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Your User Status is safe :)", "error");
                }
            });
            return false;
        })
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function renderList(getUserSendToId) {
            jQuery.ajax({
                url: "{{ route('admin.user.renderConversationList') }}",
                method: 'post',
                data: {
                    getUserSendToId: getUserSendToId
                },
                success: function(result) {
                    $('#chatContainer #conversation')
                        .html(result.html)
                        .scrollTop($("#chatContainer #conversation")[0].scrollHeight);
                },
                error: function(result) {
                    console.log(result);
                }
            });
        }
        $(document).click(function(evt) {
            if ($(evt.target).closest(".startChat").length > 0) {
                return false;
            }
            if ($(evt.target).closest("#chatContainer").length > 0) {
                return false;
            }
            $('#chatContainer').animate({
                height: 40
            }, 200).removeClass('hide');
            $('#chatContainer').css('display', 'none');
            $('#conversation').css('display', 'none');
            $('#messageTextBtn').css('display', 'none');
        });
        $(document).on('click', '.startChat', function() {
            let container = $('#chatContainer');
            if (container.hasClass('hide')) {
                container.animate({
                    height: 40
                }, 200).removeClass('hide');
                $('#chatContainer').css('display', 'none');
                $('#conversation').css('display', 'none');
                $('#messageTextBtn').css('display', 'none');
            } else {
                container.animate({
                    height: 350,
                    width: 230
                }, 200).addClass('hide');
                $('#chatContainer').css('display', 'block');
                $('#conversation').css('display', 'block');
                $('#messageTextBtn').css('display', 'block');
            }
            let getUserSendToId = $(this).attr('data-user-id');
            $('#sendToID').val(getUserSendToId)
            renderList(getUserSendToId);
        });

        $(document).on('click', '.sendMessage', function() {
            let getUserSendToId = $('#sendToID').val();
            let message = $('#chatContainer #message').val();
            jQuery.ajax({
                url: "{{ route('admin.user.sendMessage') }}",
                method: 'post',
                data: {
                    getUserSendToId: getUserSendToId,
                    message: message,
                },
                success: function(result) {
                    console.log(result);
                    $('#chatContainer #message').val('');
                    renderList(getUserSendToId);
                },
                error: function(result) {
                    console.log(result);
                }
            });
        });

        $(document).on('click', '.myFunction', function() {
            var id = $(this).attr('data-id');
            var x = document.getElementById("myInput" + id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        });
    </script>
@endsection
