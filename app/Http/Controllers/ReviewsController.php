<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Movie;
use Auth;

class ReviewsController extends Controller
{
    public function add(Request $request, Movie $movie) {

    	$review = new Review;
    	$review->by(Auth::user());
    	$review->body = $request->body;
    	$review->rating = $request->rating;

    	$movie->reviews()->save($review);

    	return back();
    }
}
