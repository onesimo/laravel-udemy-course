
@extends('layout.app')

@section('content')
 
 <h1>create post</h1>

 {!! Form::open(['method'=>'POST', 'action' => 'PostsController@store']) !!}

 <div class="form-group">

 	{!! Form::label('title','Title:') !!}
 	{!! Form::text('title',null,['class'=>'form-control']) !!}
 	
 </div>
 <div class="form-group">

 	{!! Form::submit('Create Post',['class' => 'btn btn-primary']) !!}
 	
 </div>
{!! Form::close() !!}

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}
			@endforeach
		</ul>
@endif

@endsection
 
<!--  <form method="post" action="/posts"> -->
<!--  	<input type="text" name="title" placeholder="Enter title"> -->
<!--  	{{csrf_field()}} -->
 	<!-- <input type="submit" name="submit"> -->

