@extends('layouts.admin')

@section('content')
 
	<div>
		<h1>replies</h1>
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
 	 
		@foreach($replies as $reply)
		  <tr>	
	        <td>{{$reply->id}}</td> 
	        <td>{{$reply->author}}</td> 
	        <td>{{$reply->email}}</td> 
	        <td>{{$reply->body}}</td> 
	        <td><a href="{{route('home.post', $reply->comment->post->id)}}"> View post</a></td>
	        <td>
	        	@if($reply->is_active == 1)
	        	
	        		 {!! Form::open(['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
					 <input type="hidden" value="0" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Un-approve',['class' => 'btn btn-success']) !!}
					  
					 </div>

					 {!! Form::close() !!}
	        	
				@else
					 
	        		 {!! Form::open(['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
					 <input type="hidden" value="1" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Approve',['class' => 'btn btn-info']) !!}
					  
					 </div>

					 {!! Form::close() !!}
	        	@endif

	        </td>
	        <td>
	        	{!! Form::open(['method'=>'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
					 <input type="hidden" value="1" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
					  
					 </div>

					 {!! Form::close() !!}

					</td>
	      </tr>
      	@endforeach
      	  
    </tbody>
  </table>
	</div>
@stop