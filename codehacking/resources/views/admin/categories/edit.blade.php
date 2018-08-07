@extends('layouts.admin')

@section('content')
	<h1>Categories</h1>

	<div class="col-sm6">

	 {!! Form::model($category,['method'=>'POST', 'action' => ['AdminCategoriesController@update', $category->id]) !!}
	 

	 <div class="form-group">

	  {!! Form::label('name','Name:') !!}
	  {!! Form::text('name',null,['class'=>'form-control']) !!}
	  
	 </div> 
	 <div class="form-group">

	  {!! Form::submit('Update Category',['class' => 'btn btn-primary']) !!}
	  
	 </div>

	 {!! Form::close() !!}

	</div>

@stop