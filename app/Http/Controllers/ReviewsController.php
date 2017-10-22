<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Movie;
use Auth;

class ReviewsController extends Controller
{
    public function add(Request $request, Movie $movie) {

    	$this->validate($request, [
    		'body' => 'required|min:10', 
    		'rating' => 'required|max:2'
    	]);

    	$review = new Review;
    	$review->by(Auth::user());
    	$review->body = $request->body;
    	$review->rating = $request->rating;

    	$movie->reviews()->save($review);

    	flash('Your review was successfully added!')->success();

    	return back();
    }

    public function edit(Review $review)
    {

        return view('user.edit', compact('review'));
    }

    public function patch(Request $request, Review $review) 
    {

        $this->validate($request, [
            'body' => 'required|min:10', 
            'rating' => 'required|max:2',
        ]);

        $reviews = Review::all();
        $review->update($request->all());
        flash('Your review was successfully updated!, refresh page <a href="/profile">here</a>')->success();
        return view('user.index', compact('reviews'));
    }

    public function remove(Request $request, $id)
    {
        $review = Review::find($id);
        $review->delete();

        flash('Review was successfully deleted!')->success();

        return back();
    }
}
