@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="welcome">
            <div class="alert alert-info" role="alert">

                @if(Auth::user()->role == 0)
                    <h4 class="alert-heading">Hi, {{ Auth::user()->name }}!</h4>
                    <hr>
                    <p>The control panel is now available!</p>
                @else
                    <h4 class="alert-heading">Hi, {{ Auth::user()->name }}!</h4>
                    <hr>
                    <p>You have been successfully logged in. Browse trough the collection of movies and write a review!</p>
                @endif
            </div>
        </div>
    </div>

    <div class="row-fluid content col-md-12">

        <form method="POST" action="" class="search">
            {{ csrf_field() }}
            <div class="form-group col-md-5 input-group">
                <input name="title" placeholder="Search for movie title..." class="form-control">{{old('body')}}</input>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
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
