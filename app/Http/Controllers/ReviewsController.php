<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Movie;

class ReviewsController extends Controller
{
    public function add(Request $request, Movie $movie) {

    	$review = new Review;
    	$review->body = $request->body;
    	$review->rating = $request->rating;

    	$movie->reviews()->save($review);

    	return back();
    }
}
