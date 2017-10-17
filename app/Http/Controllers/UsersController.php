<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;

class UsersController extends Controller
{
    public function roles() {
        return view('admin.index');   
    }

    public function index()
    {
    	$users = User::all();
    	$movies = Movie::all();
        return view('admin.index', compact('users', 'movies'));
    }

}
