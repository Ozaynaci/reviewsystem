<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class MoviesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function roles() {

        
    }

    public function index()
    {
    	$movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie) {

        return view('movies.show', compact('movie'));
    }
}
