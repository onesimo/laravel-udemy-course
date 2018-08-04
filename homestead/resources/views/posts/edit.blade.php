
@extends('layout.app')

@section('content')
  
 <h1>edit post</h1>
  {!! Form::model($post,['method'=>'PATCH', 'action' => ['PostsController@update',$post->id]]) !!}
   <div class="form-group">

 	{!! Form::label('title','Title:') !!}
 	{!! Form::text('title',null,['class'=>'form-control']) !!}
 	
 </div>
 <div class="form-group">

 	{!! Form::submit('Update Post',['class' => 'btn btn-info']) !!}
 	
 </div>
 {!! Form::close() !!}

   {!! Form::open(['method'=>'DELETE', 'action' => ['PostsController@destroy',$post->id]]) !!}
 	{!! Form::submit('Delete Post',['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

 <!-- <form method="post" action="/posts/{{$post->id}}">
 	<input type="hidden" name="_method" value="PUT">
 	<input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
 	{{csrf_field()}}
 	<input type="submit" name="submit" value="UPDATE">
 </form>

 <form action="/posts/{{$post->id}}" method="post">
 <input type="hidden" name="_method" value="DELETE"> 
 	{{csrf_field()}}
 	<input type="submit" value="DELETE">
 </form> -->
@endsection
 

