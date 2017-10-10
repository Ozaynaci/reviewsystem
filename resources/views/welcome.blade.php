@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-12">
        <div class="welcome">
            <h1>Please login to review</h1>
        </div>
    </div>

    <div class="row-fluid content col-md-12">

    @foreach ($movies as $movie)

        <div class="col-md-3 movie">
            <img src="{{ $movie->image_url }}" class="rounded mx-auto d-block" alt="...">
            <h4>{{ $movie->title }}</h4>
        </div>

    @endforeach
    </div>
</div>

@endsection
