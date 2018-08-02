<?php

use App\Post;
use App\User;
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
	$user = User::findOrFail(1);

	//$post = new Post(['title'=>'my first post', 'body'=>'I love laravel']);
	$user->posts()->save(new Post(['title'=>'2 my first post', 'body'=>' 2 I love laravel']));
});

Route::get('/read', function(){
	$user = User::findOrFail(1);

	foreach($user->posts as $post){
		echo $post->body."<br>";
	}
});

Route::get('/update', function(){
	$user = User::find(1);
	//$user->posts()->whereId(1)->update(['title'=>'I love lll 234', 'title' => 'new title']);
	$user->posts()->where('id', '=', '2')->update(['title'=>'I love lll 0000', 'title' => 'new title 000']);
});

Route::get('/delete', function(){

	$user = User::find(1);
	$user->posts()->whereId(1)->delete();
});

