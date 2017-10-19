<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;
use App\Review;

class UsersController extends Controller
{
    public function admin() {
        return view('admin.index');   
    }

    public function index()
    {
    	$users = User::all();
    	$movies = Movie::all();
        return view('admin.index', compact('users', 'movies'));
    }

    public function user()
    {
    	$reviews = Review::all();
    	return view('user.index', compact('reviews'));
    }

}
