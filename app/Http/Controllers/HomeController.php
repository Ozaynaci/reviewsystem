<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::inRandomOrder()->get()->take(4);
        return view('welcome', compact('movies'));
    }
}
