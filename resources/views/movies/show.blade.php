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
        </div>

        <div class="col-md-12 reviews">
            <h2>Reviews</h2>

            @foreach($movie->reviews as $review)

                <div class="wrapper">
                    <div class="col-md-3 review_block">
                        <p>{{ $review->body }}</p>
                        <span> {{ $review->rating }}</span>
                    </div>
                </div>
            
            @endforeach

            <div class="col-md-12 form_block">

                <h2>Add a review</h2>
                <form method="POST" action="/movies/{{ $movie->id }}/reviews">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group rating">
                        <span>Rate: <input type="text" name="rating" class="form-control" maxlength="2" pattern="[0-10]"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
@endsection
