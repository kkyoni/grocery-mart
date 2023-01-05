<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>First Name</th>
			<td>{{$user->first_name}}</td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td>{{$user->last_name}}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<th>Status</th>
			<td>@if($user->status == 'active')<span class="label label-primary">Active</span></a>@else<span class="label label-danger">InActive</span></a>@endif</td>
		</tr>
	</table>
</div>
