@extends('layouts.app')

@section('content')
<div class="container">
	@include('flash::message')
    <div class="col-md-12">
        <div class="welcome">
            <h1>Control panel</h1>
        </div>

        <div class="col-md-4 hidden_users">
  			<a href="/admin/hidden/" class="btn btn-primary">
  				Hidden users <span class="badge badge-primary badge-pill">{{ $userscount }}</span>
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

					@if($user->status == 'off')
						<td>
							<form method="POST" action="/admin/{{ $user->id }}/enable">
								{{ method_field('PATCH') }}
			  					{{ csrf_field() }}
			  					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					      		<button type="submit" class="btn btn-primary" name="enable">Enable</button>
					      	</form>
					    </td>
				    @else
				    	@if($user->role == '1')
						    <td>
								<form method="POST" action="/admin/{{ $user->id }}/disable">
									{{ method_field('PATCH') }}
				  					{{ csrf_field() }}
				  					<input type="hidden" name="_token" value="{{ csrf_token() }}">

						      		<button type="submit" class="btn btn-primary" name="disable">Disable</button>
						      	</form>
						    </td>
						@endif
				    @endif
				</tr>
		    @endforeach
		  </tbody>
		</table>

		<table class="table table_movies">
		  <thead class="thead-inverse">
		    <tr class="table-info">
		      <th>#</th>
		      <th></th>
		      <th>Title</th>
		      <th>Year</th>
		      <th>Genre</th>
		      <th>Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($movies as $movie)
			    <tr>
			      <td> {{ $movie->id }} </td>
			      <td> <img class="rounded" src="{{ $movie->image_url }}"> </td>
			      <td> {{ $movie->title }} </td>
			      <td> {{ $movie->year }} </td>
			      <td> {{ $movie->genre }} </td>
			      <td>
			      	<form method="POST" action="/admin/{{ $movie->id }}">
			      		{{ method_field('DELETE') }}
	  					{{ csrf_field() }}
	  					<input type="hidden" name="_token" value="{{ csrf_token() }}">

			      	<button type="submit" class="btn btn-danger">
			      		<i class="fa fa-trash" aria-hidden="true"></i>
			      	</button>
			      	</form>
			      </td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>

		<div class="col-md-12">
            <h2>Add movie</h2>

            <div class="col-md-12 form_block">

                @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger col-md-12" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                @endif

                <form method="POST" action="/admin">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6 add_movie">
                        Title: <input type="text" name="title" class="form-control" placeholder="Lord of the Ring">
                        Description: <textarea name="body" class="form-control" placeholder="The Lord of the Rings is an epic high fantasy...">{{old('body')}}</textarea>
                        Year: <input type="text" name="year" class="form-control" placeholder="2001">
                        Genre: <input type="text" name="genre" class="form-control" placeholder="Fantasy">
                        Image url<input type="text" name="image_url" class="form-control" placeholder="https://">
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
@endsection
