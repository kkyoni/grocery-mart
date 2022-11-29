<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Category Name</th>
			<td>{{$product->Category->name}}</td>
		</tr>
		<tr>
			<th>Title</th>
			<td>{{$product->title}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td>@if(!empty($product->image))
				<img src="{!! @$product->image !== '' ? url("storage/product/".@$product->image) : url('storage/default.png') !!}" alt="user-img" class="img-circle" style="height: 50px; width: 50px; border-radius: 50px;">
				@else
				<img src="{!! url('storage/product/default.png') !!}" alt="user-img" class="img-circle" accept="image/*" style="height: 100px; width: 100px; border-radius: 50px;">
				@endif
			</td>
		</tr>
		<tr>
			<th>Sub Title</th>
			<td>{{$product->sub_title}}</td>
		</tr>
		<tr>
			<th>Price</th>
			<td>{{$product->price}}</td>
		</tr>
		<tr>
			<th>Description</th>
			<td>{{$product->description}}</td>
		</tr>
		<tr>
			<th>Color</th>
			<td>{{$product->color}}</td>
		</tr>
	</table>
</div>