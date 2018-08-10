<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model 
{   
    use Sluggable;
    use SluggableScopeHelpers;
    
    protected $fillable = [
    	'title', 
    	'body',
    	'category_id',
    	'photo_id',
    	'user_id'
    ];

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function photo()
    {
    	return $this->belongsTo('App\Photo');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceHoder()
    {
        return "http://placehold.it/700x200";
    }
}
