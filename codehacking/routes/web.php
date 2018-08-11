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



Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('/post/{id}', ['as'=>'home.post', 'uses' => 'HomeController@post']);

Route::group(['middleware'=>'admin'], function(){

	Route::get('/admin', 'AdminController@index');
	Route::resource('admin/users','AdminUsersController',['as' => 'admin']);
	Route::resource('admin/posts','AdminPostsController',['as' => 'admin']);
	Route::resource('admin/categories','AdminCategoriesController', ['as' => 'admin']);
	Route::resource('admin/media','AdminMediasController',['as'=> 'admin']);
	Route::resource('admin/comments','PostCommentsController',['as' => 'admin'] );
	Route::resource('admin/comments/replies','CommentRepliesController', ['as' => 'admin']);
});

Route::group(['middleware'=>'auth'], function(){

	Route::delete('admin/delete/media','AdminMediasController@deleteMedia');
	Route::post('comment/reply','CommentRepliesController@createReply');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('login', '\App\Http\Controllers\Auth\LoginController@login');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Auth::routes();