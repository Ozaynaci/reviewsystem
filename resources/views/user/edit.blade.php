@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="col-md-12">

    	@if (count($errors))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger col-md-12" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif

    	<h1>Edit review</h1>
    	<br>

    	<form method="POST" action="/profile/{{$review->id}}">
	        {{ csrf_field() }}
	        {{ method_field('PATCH') }}
	        <div class="form-group col-md-6 review_field">
	            <textarea name="body" class="form-control" placeholder="This is an awesome movie">{{ $review->body }}</textarea>
	        </div>

	        <div class="form-group rating col-md-2">
	            <input type="number" name="rating" class="form-control" min="0" max="10" value="{{ $review->rating }}">
	        </div>
	        <div class="form-group col-md-12">
	            <a href="/profile" class="btn btn-info">Back</a>
	            <button type="submit" class="btn btn-info">Update</button>
	        </div>
	    </form>
		
    </div>



</div>
@endsection
