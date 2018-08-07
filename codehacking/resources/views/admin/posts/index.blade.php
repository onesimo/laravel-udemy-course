@extends('layouts.admin')

@section('content')
  
  @if(Session::has('deleted_user'))
    <p class="bg-danger">{{session('deleted_user')}}</p>
  @endif

	<h1>posts</h1>
	<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Photo</th>
        <th>title</th>
        <th>body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
 	
 	@if($posts)
		
		@foreach($posts as $post)
	  <tr>
        <td>{{$post->id}}</td> 
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        <td><img height="50" src="{{isset($post->photo) ? $post->photo->file : 'http://placehold.it/200x200'}}"></td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      	@endforeach

     @endif
    </tbody>
  </table>
@stop