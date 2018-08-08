<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
		'comment_id',
		'author',
		'email',
		'body',
		'is_active'
	];
    public function replies()
    {
    	return belongsTo('App\Comment');
    }
}
