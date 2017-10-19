@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')

    <div class="row-fluid content col-md-12">

        <div class="col-md-3 movie_image">
            <img src='{{ $movie->image_url }}' class="rounded mx-auto d-block" alt="...">
        </div>
        <div class="col-md-7 col-md-offset-1 description_text">
            <h1> {{ $movie->title }} </h1>
            <div class="description_info">
                <span> Year: {{ $movie->year }} </span> <br>
                <span> Genre: {{ $movie->genre }} </span>
            </div>
            <p> {{ $movie->body }} </p>
            <a class="btn btn-info" href="/movies/">Back</a>
        </div>

        <div class="col-md-12 reviews">
            <h2>Reviews</h2>

            @foreach($movie->reviews as $review)

                <div class="wrapper">
                    <div class="col-md-11 review_block">
                        <p class="pull-right">{{ $review->created_at }}</p>
                        <p>{{ $review->body }}</p>
                        <span> {{ $review->rating }}</span>
                        <a href="#" class="pull-right">{{ $review->user->name }}</a>
                    </div>
                </div>
            
            @endforeach

            @if(Auth::user()->role == 0)

            <div class="col-md-12 form_block">

            </div>

            @else

                @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger col-md-12" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                @endif

                <form method="POST" action="/movies/{{ $movie->id }}/">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6 review_field">
                        <h4>Add a review:</h4>
                        <textarea name="body" class="form-control" placeholder="This is an awesome movie">{{old('body')}}</textarea>
                    </div>

                    <div class="form-group rating col-md-2">
                        <h4> Rate:</h4>
                        <input type="number" name="rating" class="form-control" min="0" max="10" placeholder="7" value="{{old('rating')}}">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            @endif

        </div>

    </div>

</div>
@endsection
