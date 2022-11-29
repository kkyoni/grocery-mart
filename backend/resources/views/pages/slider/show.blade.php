<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Title</th>
			<td>{{$slider->title}}</td>
		</tr>
		<tr>
			<th>Sub Title</th>
			<td>{{$slider->sub_title}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td>@if(!empty($slider->image))
				<img src="{!! @$slider->image !== '' ? url("storage/slider/".@$slider->image) : url('storage/default.png') !!}" alt="user-img" class="img-circle" style="height: 50px; width: 50px; border-radius: 50px;">
				@else
				<img src="{!! url('storage/slider/default.png') !!}" alt="user-img" class="img-circle" accept="image/*" style="height: 100px; width: 100px; border-radius: 50px;">
				@endif
			</td>
		</tr>
		<tr>
			<th>Description</th>
			<td>{{$slider->description}}</td>
		</tr>
	</table>
</div>