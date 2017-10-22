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

    public function index()
    {

        $search = \Request::get('search');
 
        $movies = Movie::where('title','like','%'.$search.'%')
            ->orderBy('title')
            ->paginate(20);
        $count = Movie::count($movies);

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie, User $users) 
    {
        return view('movies.show', compact('movie', 'users'));
    }

    public function add(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required|min:10',
            'year' => 'required|max:4',
            'genre' => 'required|max:10',
            'image_url' => 'required'
        ]);

        $movie = new Movie;
        $movie->title = $request->title;
        $movie->body = $request->body;
        $movie->year = $request->year;
        $movie->genre = $request->genre;
        $movie->image_url = $request->image_url;

        $movie->save();

        flash('Movie was successfully added!')->success();

        return back();
    }

    public function remove(Request $request, $id) {

        $movie = Movie::find($id);
        $movie->delete();

        flash('Movie was successfully deleted!')->success();
        

        return back();
    }
}
