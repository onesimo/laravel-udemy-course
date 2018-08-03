<?php

use App\Staff;
use App\Photo;

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

	$staff = Staff::find(1);
	$staff->photos()->create(['path'=>'example.jpg']);
});

Route::get('/read', function(){

	$staff = Staff::findOrFail(1);

	foreach($staff->photos as $photo){
		return $photo->path;
	}
});

Route::get('/update',function(){
	$staff = Staff::findOrFail(1);

	$photo = $staff->photos()->whereId(1)->first();
	$photo->path = 'pathupdate.jpg';
	$photo->save();
});

Route::get('/delete',function(){
	$staff = Staff::findOrFail(1);

	$staff->photos()->whereId(1)->delete();

});

Route::get('assign',function(){

	$staff = Staff::findOrFail(1);
	$photo = Photo::findOrFail(2);

	$staff->photos()->save($photo);

});

Route::get('unassign',function(){

	$staff = Staff::findOrFail(1);
  
	$staff->photos()->whereId(2)->update(['imageable_id'=>0, 'imageable_type'=>'']);

});