<div class="form-group  row {{ $errors->has('image') ? 'has-error' : '' }}">
    <div id="imagePreview" class="profile-image">
        @if(!empty($blog->image))
        <img src="{!! @$blog->image !== '' ? url("storage/blog/".@$blog->image) : url('storage/default.png') !!}" alt="user-img" class="img-circle">
        @else
        <img src="{!! url('storage/blog/default.png') !!}" alt="user-img" class="img-circle" accept="image/*">
        @endif
    </div> 
    {!! Form::file('image',['id' => 'hidden','accept'=>"image/*"]) !!}
</div>

<div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Title</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::text('title',null,['class' => 'form-control','id'    => 'title']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('title') ? "".$errors->first('title')."" : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Description</strong>
        <span class="text-danger">*</span>
    </label>
    <div class="col-sm-6">
        {!! Form::textarea('description',null,['class' => 'form-control ','id'    => 'description']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('description') ? "".$errors->first('description')."" : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
    <label class="col-sm-3 col-form-label">
        <strong>Status</strong>
    </label>
    <div class="col-sm-6 inline-block">
        <div class="i-checks">
            <label>
                {{ Form::radio('status', 'active' ,true,['id'=> 'active']) }} <i></i> Active
            </label>
            <label>
                {{ Form::radio('status', 'inactive' ,false,['id' => 'inactive']) }} <i></i> Inactive
            </label>
        </div>
        <span class="help-block">
            <font color="red">  {{ $errors->has('status') ? "".$errors->first('status')."" : '' }} </font>
        </span>
    </div>
</div>

@section('styles')
<link href="{{ asset('assets/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{ asset('assets/admin/js/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript">
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    
</script>
<script>
var searchInput = 'search_input';
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#imagePreview img').on('click',function(){
    $('input[type="file"]').trigger('click');
    $('input[type="file"]').change(function() {
        readURL(this);
    });
});
</script>
@endsection