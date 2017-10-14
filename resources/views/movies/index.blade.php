@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="welcome">
            <h1>Hi, {{ Auth::user()->name }}</h1>
        </div>
    </div>

    <div class="row-fluid content col-md-12">

        <form method="POST" action="" class="search">
            {{ csrf_field() }}
            <div class="form-group col-md-5 input-group">
                <input name="body" placeholder="Search for a movie" class="form-control">{{old('body')}}</input>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Search</button>
                </span>
            </div>
        </form>

        <!-- foreach loop door db -->

        @foreach ($movies as $movie)

            <div class="col-md-3 movie">
                <img src="{{ $movie->image_url }}" class="rounded mx-auto d-block" alt="...">
                <h4>{{ $movie->title }}</h4>
                <a href="{{ $movie->path() }}">More information</a>
            </div>

        @endforeach

    </div>

</div>
@endsection
