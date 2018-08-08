@extends('layouts.admin')

@section('content')
 
	<div>
				<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th> 
        <th>Email</th> 
        <th>body</th>
<!--         <th>Created</th>
        <th>Updated</th> -->
        <th></th>
      </tr>
    </thead>
    <tbody>
 	
 	@if($comments)
		
		@foreach($comments as $comment)
		  <tr>	
	        <td>{{$comment->id}}</td> 
	        <td>{{$comment->author}}</td> 
	        <td>{{$comment->email}}</td> 
	        <td>{{$comment->body}}</td> 
	        <td><a href="{{route('home.post', $comment->post->id)}}"> View post</a></td> 
	      </tr>
      	@endforeach

     @endif
    </tbody>
  </table>
	</div>
@stop