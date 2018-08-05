<?php

use Illuminate\Support\Facades\Mail;
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
    //return view('welcome');

	$data = [
		'title' => 'Hi students',
		'content' => 'This is the content of an email'
	];

	Mail::send('emails.test', $data, function($message){
		$message->to('onesimobatista@gmail.com','Onesimo')->subject('this is the subject of an email text');
	});
});


