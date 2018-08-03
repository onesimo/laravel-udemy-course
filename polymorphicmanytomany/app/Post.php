<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['name'];
	
    public function tags()
    {
    	return $this->morphTomany('App\Tag','taggable');
    }
}
