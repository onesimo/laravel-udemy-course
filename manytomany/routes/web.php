<?php

use App\User;
use App\Role;
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
	$user = User::find(1);

	$user->roles()->save(new Role(['name'=>'ASD']));
});

Route::get('/read', function(){

	$user = User::findOrFail(1);

	foreach($user->roles as $role){
		echo $role->name;
	}
});

Route::get('/update',function(){
	$user = User::findOrFail(1);

	if($user->has('roles')){
		foreach($user->roles as $role){
			if($role->name == 'administrator'){
				$role->name = 'subscriber';
				$role->save();
			}
		}
	}
});

Route::get('/delete', function(){
	$user = User::findOrFail(1);

	foreach ($user->roles as $role) {
		
		dd($user->roles);
		//$role->whereId(4)->delete();
	}
	//$user->roles()->delete();
});


//add data
Route::get('/attach', function(){

	$user = User::findOrFail(2);

	$user->roles()->attach(7);
});

//remove
Route::get('/detach', function(){

	$user = User::findOrFail(2);

	$user->roles()->detach(7);
});

Route::get('/sync',function(){
	$user = User::findOrFail(1);

	$user->roles()->sync([1,2,3,5,6,7,14]);
});