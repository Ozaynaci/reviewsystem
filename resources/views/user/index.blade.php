@extends('layouts.app')

@section('content')
<div class="container">
    
	@if(Auth::user()->role == 1)

		<div class="alert alert-info" role="alert">
	    	<h4 class="alert-heading">This is your personal page</h4>
	        <hr>
	        <p>Reviews can be viewed & edited on this page</p>
	    </div>
    @endif

    @include('flash::message')

    <div class="col-md-12">

    	<table class="table table_users">
		  <thead class="thead-inverse">
		    <tr class="table-info">
		      <th>#</th>
		      <th>User:</th>
		      <th>Review:</th>
		      <th>Rating:</th>
		      <th>Date:</th>
		      <th>Edit:</th>
		      <th>Delete:</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($reviews as $review)
		  	@if(Auth::user()->name == $review->user->name)
			    <tr>
			      <td> {{ $review->id }} </td>
			      
			      <td> {{ $review->user->name }} </td>
			      <td> {{ $review->body }} </td>
			      <td> {{ $review->rating }} </td>
			      <td> {{ $review->created_at }} </td>

			      <td>
			      	<a href="/profile/{{$review->id}}/edit" class="btn btn-info">
			      		<i class="fa fa-edit" aria-hidden="true"></i>
			      	</a>
			      </td>
			      <td>
			      	<form method="POST" action="/profile/{{ $review->id }}">
			      		{{ method_field('DELETE') }}
	  					{{ csrf_field() }}
	  					<input type="hidden" name="_token" value="{{ csrf_token() }}">

			      	<button type="submit" class="btn btn-danger">
			      		<i class="fa fa-trash" aria-hidden="true"></i>
			      	</button>
			      	</form>
			      </td>

			    </tr>
			@endif
		    @endforeach
		  </tbody>
		</table>
    </div>



</div>
@endsection
