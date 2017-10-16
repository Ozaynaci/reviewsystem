@extends('layouts.app')

@section('content')
<div class="container">

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
            <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
        </div>

        <div class="col-md-12 reviews">
            <h2>Reviews</h2>

            @foreach($movie->reviews as $review)

                <div class="wrapper">
                    <div class="col-md-3 review_block">
                        <p>{{ $review->body }}</p>
                        <span> {{ $review->rating }}</span>
                        <a href="#" class="username_review">{{ $review->user->name }}</a>
                    </div>
                </div>
            
            @endforeach

            <div class="col-md-12 form_block">

                <form method="POST" action="/movies/{{ $movie->id }}/">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6 review_field">
                        <h4>Add a review</h4>
                        <textarea name="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group rating col-md-2">
                        <h4>Rate: 0-10</h4>
                        <input type="text" name="rating" class="form-control" maxlength="2">
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
