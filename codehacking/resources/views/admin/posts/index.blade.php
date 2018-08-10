@extends('layouts.admin')

@section('content')
  
  @if(Session::has('deleted_post'))
    <p class="bg-danger">{{session('deleted_post')}}</p>
  @endif

	<h1>posts</h1>
	<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Owner</th>
        <th>Category</th>
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
        <td><img height="50" src="{{isset($post->photo) ? $post->photo->file : 'http://placehold.it/200x200'}}"></td>
        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
        <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{str_limit($post->body,12)}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
        <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
        <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
      </tr>
      	@endforeach

     @endif
    </tbody>
  </table>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{$posts->links()}}
    </div>
    
  </div>
@stop