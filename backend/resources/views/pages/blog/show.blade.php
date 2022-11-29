<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Title</th>
			<td>{{$blog->title}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td>@if(!empty($blog->image))
				<img src="{!! @$blog->image !== '' ? url("storage/blog/".@$blog->image) : url('storage/default.png') !!}" alt="user-img" class="img-circle" style="height: 50px; width: 50px; border-radius: 50px;">
				@else
				<img src="{!! url('storage/blog/default.png') !!}" alt="user-img" class="img-circle" accept="image/*" style="height: 100px; width: 100px; border-radius: 50px;">
				@endif
			</td>
		</tr>
		<tr>
			<th>Description</th>
			<td>{{$blog->description}}</td>
		</tr>
	</table>
</div>