@extends('layouts.app')

@section('content')

<div class="container">

	@include('flash::message')
    <div class="col-md-12 admin_page">
            <h1>Hidden accounts</h1>

        <div class="col-md-4 hidden_users">
  			<a href="/admin/" class="btn btn-info">
  				Back
  			</a>
        </div>

        <table class="table table_users">
		  <thead class="thead-inverse">
		    <tr class="table-info">
		      <th>#</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Role</th>
		      <th>Status</th>
		      <th></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if (!$users->count())
				<div class="alert alert-info hidden_alert" role="alert">No hidden accounts found!</div>
			@else
		  	@foreach($users as $user)
		  		<tr>
					<td> {{ $user->id }} </td>
					<td> {{ $user->name }} </td>
					<td> {{ $user->email }} </td>
					<td> {{ $user->role }} </td>
					<td> {{ $user->status }} </td>
					<td>
						<form method="POST" action="/admin/{{ $user->id }}/enable">
							{{ method_field('PATCH') }}
		  					{{ csrf_field() }}
		  					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				      		<button type="submit" class="btn btn-info" name="enable">Enable</button>
				      	</form>
				    </td>
				</tr>
			@endforeach
			@endif
		  </tbody>
		</table>
	</div>

</div>

@endsection