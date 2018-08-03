<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/remove', function(){
	$delete = DB::delete('delete  from posts where id = ?', [1]);
	return $delete;
});

Route::get('/update', function(){
	$update = DB::update('update posts set title = "update title" where id = ?',[1]);
	return $update;
});

Route::get('/read', function(){
	$results = DB::select('select * from posts where id = ?', [1]);

	var_dump($results);
	foreach ($results as $key => $value) {
		//return $value->title;
	}
});
*/


Route::get('/insert', function(){
	DB::insert('insert into posts (title, content) values (?,?)',['B laravel', 'B Laravel is the best']);  
});

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
/*


Route::get('/about/{name}/age/{age}', function ($name, $age) {
    return "about me  - ".$name. " age ".$age ;
});

Route::get('admin/posts/example', array( 'as' => 'admin.home' ,function(){
	$url = route('admin.home');

	return "this url is ". $url;
}));

Route::get('/post/{id}', 'PostsController@index');



Route::resource('posts','PostsController');*/

// Route::get('/contact', 'PostsController@contact');

// Route::get('post/{id}/{name}', 'PostsController@show_post');

/*|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
|


Route::get('/read', function(){
	$posts = Post::all();

	foreach ($posts as $post) {
		return $post->title;
	}
});

Route::get('/find', function(){
	$posts = Post::find(2);

	return $posts->title;
});

*/

Route::get('/findwhere', function(){
	$posts = Post::where('id',2)->orderBy('id', 'desc')->take(1)->get();

	return $posts;
});

Route::get('/findmore', function(){
/*	$posts = Post::findOrFail(1);
	return $posts;

	$posts= Post::where('id', '<', '50')->firstOrFail();


*/
});

Route::get('/basicinsert', function(){
	$post = new Post;

	$post->title = 'New Eloquent title insert';
	$post->content = 'This content, really cool';

	$post->save();
});


/*
To update using eloquent
*/

Route::get('/basicinsert2', function(){

	$post = Post::find(2);

	$post->title = 'New update 2 ';
	$post->content = 'new update';

	$post->save();
});



/*
mass assignment using eloquent
*/

Route::get('/create', function(){

	Post::create(['title'=>'the create method', 'content'=>'I\'m learning a lot']);

});

Route::get('/update', function(){

	Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'new title updated', 'content'=>'test']);
});


/*
delete using eloquent
*/

Route::get('/delete',function(){

	$post = Post::find(2);

	$post->delete();
});

Route::get('/delete2', function(){
	//Post::destroy(3);
	Post::where('is_admin',0)->delete();
});

Route::get('/softdelete', function(){
	Post::find(7)->delete();
}); 


Route::get('/restore', function(){
	Post::withTrashed()->where('is_admin', 0)->restore();
});

Route::get('/readsoftdelete', function(){
	$post = Post::onlyTrashed()->where('id', 9)->get();

	return $post;
});

Route::get('/forcedelete',function(){
	Post::withTrashed()->where('id', 9)->forceDelete();
});


/*
ELOQUENT Relationships
*/

//One to One relationship
Route::get('/user/{id}/post', function($id){

	return User::find($id)->post->title;

});
//reverse
Route::get('/post/{id}/user', function($id){

	return Post::find($id)->user->name;
});

//One to Many 
Route::get('/posts', function(){

	$user = User::find(1);

	foreach ($user->posts as $post) {
		echo $post->title. "<br>";
	}
});


/*
Many to many
*/



Route::get('/user/{id}/role',function($id){
/*	
	$user = User::find($id);


	foreach ($user->roles as $role) {
		return $role->name;
	}
*/

	$user = User::find($id)->roles()->orderBy('id', 'desc')->get();

	return $user;
});

/*
Accessing the intermediate table / pivot */

Route::get('user/pivot', function(){

	$user = User::find(1);

	foreach ($user->roles as $role) {
		echo $role->pivot->created_at;
	}
});

Route::get('user/country', function(){

	$country = Country::find(2);

	foreach ($country->posts as $post) {
		return $post->title;
	}

});

/*
Polymorphic Relations
*/

Route::get('user/photos',function(){
	$user = User::find(1);

	foreach ($user->photos as $photo) {
		return $photo->path;
	}
});

Route::get('post/{id}/photos',function($id){
	$post = Post::find($id);

	foreach ($post->photos as $photo) {
		echo $photo->path."<br>";
	}
});

Route::get('photo/{id}/post', function($id){

	$photo = Photo::findOrFail($id);

	return $imageable = $photo->imageable;
});


/*
Polymorphic Many to Many
*/

Route::get('/post/tag', function(){

	$post = Post::find(1);

	foreach ($post->tags as $tag) {
		echo $tag->name;
	}
});

Route::get('/tag/post',function(){
	
	$tag = Tag::find(2);

	foreach ($tag->posts as $post){
		echo $post->title;
	}
});

