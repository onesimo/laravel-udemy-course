<?php

Use App\Post;
use App\Tag;
use App\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){

	$post = Post::create(['name'=>'My first post']);
	$tag1 = Tag::find(1);
	$post->tags()->save($tag1);

	$video = Video::create(['name'=>'My first video']);
	$tag2 = Tag::find(2);
	$video->tags()->save($tag2);

});

Route::get('/read', function(){

	$post = Post::findOrFail(2);

	//dd($post->tags);
	foreach($post->tags as $tag){
		echo $tag;
	}
});

Route::get('/update', function(){

	$post = Post::findOrFail(2);

	//dd($post->tags);
	/*foreach($post->tags as $tag){
		return $tag->whereName('PHP')->update(['name' =>'Updated Tag']);
	}*/
	//or
	$tag = Tag::find(3);
	//$post->tags()->save($tag);

	//or
	//$post->tags()->attach($tag);

	$post->tags()->sync([1,2]);

});

Route::get('/delete', function(){

	$post = Post::find(2);

	/*foreach($post->tags as $tag){
		$tag->whereId(1)->delete();
	}*/

	//delete from pivot table
	$post->tags()->detach(2);
});
