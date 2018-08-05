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

Route::get('/', function () {
 return view('welcome');
/*
if(Auth::check()){
	return "the user is logged in";
}*/
/*
$username = 'email';
$password = '1123423';

	if(Auth::attempt(['email' =>$username, 'password' => $password])){

		return redirect()->intended();
	}
*/
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
