<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	protected $fillable = ['body'];

    public function movie() {

    	return $this->belongsTo(Movie::class);

    }

    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function by(User $user)
	{
		$this->user_id = $user->id;
	}
}
