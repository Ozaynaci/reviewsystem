<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function path() {
    	return '/movies/' . $this->id;
    }

    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}
