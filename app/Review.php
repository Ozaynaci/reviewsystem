<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	protected $fillable = ['body'];

    public function movie() {

    	return $this->belongsTo(Movie::class);

    }
}
