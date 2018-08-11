<?php

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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('/post/{id}', ['as'=>'home.post', 'uses' => 'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){


	Route::get('/admin', 'AdminController@index');

	Route::resource('admin/users','AdminUsersController',['as' => 'admin']);
	Route::resource('admin/posts','AdminPostsController',['as' => 'admin']);
	Route::resource('admin/categories','AdminCategoriesController', ['as' => 'admin']);
	Route::resource('admin/media','AdminMediasController',['as'=> 'admin']);
	Route::resource('admin/comments','PostCommentsController',['as' => 'admin'] );
	Route::resource('admin/comments/replies','CommentRepliesController', ['as' => 'admin']);
	//Route::get('admin/media/upload',['as'=> 'admin.media.upload', 'uses' => 'AdminMediasController@store']);
});

Route::group(['middleware'=>'auth'], function(){

	Route::delete('admin/delete/media','AdminMediasController@deleteMedia');

	Route::post('comment/reply','CommentRepliesController@createReply');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
