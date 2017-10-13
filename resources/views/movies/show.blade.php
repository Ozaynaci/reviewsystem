@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row-fluid content col-md-12">

        <div class="col-md-4">
            <img src='{{ $movie->image_url }}' class="rounded mx-auto d-block" alt="...">
        </div>
        <div class="col-md-7 col-md-offset-1 description_text">
            <h1> {{ $movie->title }} </h1>
            <span> {{ $movie->year }} </span>
            <p> {{ $movie->body }} </p>
        </div>

    </div>

</div>
@endsection
