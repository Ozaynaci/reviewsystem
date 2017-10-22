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
    	$users = User::all()->where('status', 'on');
        $userscount = User::where('status', 'off')->count('status');
    	$movies = Movie::all();
        return view('admin.index', compact('users', 'userscount', 'movies'));
    }

    public function user()
    {
    	$reviews = Review::all();
    	return view('user.index', compact('reviews'));
    }

    public function remove(Request $request, $id) {

        $user = User::findOrFail($id);
        $user->delete();

        flash('User was successfully deleted!')->success();

        return back();
    }

    public function enable($id) {

        $user = User::findOrFail($id);
        $user->status = 'on';
        $user->update();

        flash('Enabled '. $user->name)->success();
        return back();
    }

    public function disable($id) {

        $user = User::findOrFail($id);
        $user->status = 'off';
        $user->update();

        flash('Disabled '. $user->name)->success();
        return back();
    }

    public function hiddenUsers() {
        $users = User::all()->where('status', 'off');
        return view('admin.hidden', compact('users'));
    }

}
