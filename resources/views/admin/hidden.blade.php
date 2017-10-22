@extends('layouts.app')

@section('content')

<div class="container">

	@include('flash::message')
    <div class="col-md-12">
        <div class="welcome">
            <h1>Control panel</h1>
        </div>

        <div class="col-md-4 hidden_users">
  			<a href="/admin/" class="btn btn-primary">
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

				      		<button type="submit" class="btn btn-primary" name="enable">Enable</button>
				      	</form>
				    </td>
				</tr>
			@endforeach
		  </tbody>
		</table>
	</div>

</div>

@endsection