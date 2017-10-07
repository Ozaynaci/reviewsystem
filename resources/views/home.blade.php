@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-12">
        <div class="welcome_username">
            <h1>Hi, {{ Auth::user()->name }}</h1>
        </div>
    </div>

    <!-- foreach loop door db -->
    <div class="content col-md-12">

        <form method="POST" action="" class="search">
            {{ csrf_field() }}
            <div class="form-group col-md-5 input-group">
                <input name="body" placeholder="Search for a movie" class="form-control">{{old('body')}}</input>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Search</button>
                </span>
            </div>
        </form>

        <div class="col-md-3 movie">
            <img src="http://via.placeholder.com/220x350" class="rounded mx-auto d-block" alt="...">
            <h3>Title of the movie</h3>
            <a href="" class="">More information</a>
        </div>

        <div class="col-md-3 movie">
            <img src="http://via.placeholder.com/220x350" class="rounded mx-auto d-block" alt="...">
            <h3>Title of the movie</h3>
            <a href="" class="">More information</a>
        </div>

        <div class="col-md-3 movie">
            <img src="http://via.placeholder.com/220x350" class="rounded mx-auto d-block" alt="...">
            <h3>Title of the movie</h3>
            <a href="" class="">More information</a>
        </div>

        <div class="col-md-3 movie">
            <img src="http://via.placeholder.com/220x350" class="rounded mx-auto d-block" alt="...">
            <h3>Title of the movie</h3>
            <a href="" class="">More information</a>
        </div>
    </div>

</div>
@endsection
