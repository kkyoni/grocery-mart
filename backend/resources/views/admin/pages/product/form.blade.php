<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Product info</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Product Category</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Product Images</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product Name']) !!}
                                    <span class="help-block">
                                        <font color="red">
                                            {{ $errors->has('name') ? '' . $errors->first('name') . '' : '' }}
                                        </font>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Price:</label>
                                <div class="col-sm-10">
                                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '160.00']) !!}
                                    <span class="help-block">
                                        <font color="red">
                                            {{ $errors->has('price') ? '' . $errors->first('price') . '' : '' }}
                                        </font>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description:</label>
                                <div class="col-sm-10">
                                    {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'id' => 'description']) !!}
                                    <span class="help-block">
                                        <font color="red">
                                            {{ $errors->has('description') ? '' . $errors->first('description') . '' : '' }}
                                        </font>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Brand:</label>
                                <div class="col-sm-10">
                                    {!! Form::select('brand_id', $brand_list, null, [
                                        'class' => 'form-control',
                                        'id' => 'brand_id',
                                        'placeholder' => 'Select Brand Name',
                                    ]) !!}
                                    <span class="help-block">
                                        <font color="red">
                                            {{ $errors->has('brand_id') ? '' . $errors->first('brand_id') . '' : '' }}
                                        </font>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Name:</label>
                                <div class="col-sm-10">
                                    <select id="category_id" name="category_id" class="form-control">
                                    </select>
                                    <span class="help-block">
                                        <font color="red">
                                            {{ $errors->has('category_id') ? '' . $errors->first('category_id') . '' : '' }}
                                        </font>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">

                        <label class="btn btn-primary fileuploader-btn mb-4">Add Image.</label>
                        <input type="file" class="fileuploader" name="image_url[]" id="image_url" multiple="multiple"
                            style="display: none;">

                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>
                                            Image preview
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="jk">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('styles')
    <link href="{{ asset('assets/admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });
        $('#brand_id').on('change', function() {
            var idbrand = this.value;
            $("#category_id").html('');
            $.ajax({
                url: "{{ route('admin.product.getbrand') }}",
                type: "POST",
                data: {
                    idbrand: idbrand,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#category_id').html('<option value="">-- Select Category --</option>');
                    $.each(result.categories, function(key, value) {
                        $("#category_id").append('<option value="' + value
                            .id + '">' + value.categories_name + '</option>');
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.fileuploader-btn').on('click', function() {
                $('.fileuploader').click();
            });
            $('.fileuploader').change(function() {
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var x = 1;
                if (extn == "png" || extn == "jpg") {
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function(file) {
                            console.log(file);
                            var fileContent = file.target.result;
                            $('.jk').append('<tr><td><img src="' + fileContent +
                                '" width="100" height="100" controls></td><td><div class="btn btn-white closeing"><i class="fa fa-trash"></i> </div></td>'
                            );
                        }
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    alert("Pls Select Only File PNG Or JPG.");
                    // location.reload();
                }
            });
        });
        $(document).on('click', '.closeing', function(e) {
            alert("Remove This Files");
            // location.reload();
        });
    </script>
@endsection
