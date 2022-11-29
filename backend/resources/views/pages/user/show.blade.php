<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Name</th>
			<td>{{$user->name}}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td>@if(!empty($user->avatar))
				<img src="{!! @$user->avatar !== '' ? url("storage/avatar/".@$user->avatar) : url('storage/default.png') !!}" alt="user-img" class="img-circle" style="height: 50px; width: 50px; border-radius: 50px;">
				@else
				<img src="{!! url('storage/avatar/default.png') !!}" alt="user-img" class="img-circle" accept="image/*" style="height: 100px; width: 100px; border-radius: 50px;">
				@endif
			</td>
		</tr>
		<tr>
			<th>Status</th>
			<td>{{$user->status}}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{date_format($user->created_at,"d M Y H:i A")}}</td>
		</tr>
	</table>
</div>