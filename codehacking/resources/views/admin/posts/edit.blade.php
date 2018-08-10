@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<div cas></div>
	<h1>Edit posts</h1>

    <div class="row">
      <div class="col-sm-3">
        <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/200x200'}}" alt="" class="img-responsive img-rounded">
      </div>  

 
 <div class="col-sm-9">
 {!! Form::model($post, ['method'=>'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
 

 <div class="form-group">

  {!! Form::label('title','Title:') !!}
  {!! Form::text('title',null,['class'=>'form-control']) !!}
  
 </div>


 <div class="form-group">

  {!! Form::label('category_id','Category:') !!}
  {!! Form::select('category_id',array('
  '=>'Choose Categories') + $categories,null,['class'=>'form-control']) !!}
  
 </div> 


 <div class="form-group">

  {!! Form::label('photo_id','Photo:') !!}
  {!! Form::file('photo_id', ['class'=>'form-control']) !!}
  
 </div>

  <div class="form-group">

  {!! Form::label('body','Description:') !!}
  {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 3]) !!}
  
 </div>
  

 <div class="form-group">

  {!! Form::submit('Update posts',['class' => 'btn btn-primary col-sm-2']) !!}
  
 </div>
{!! Form::close() !!}
 
  {!! Form::close() !!}

  {!! Form::open(['method'=>'DELETE', 'action' => ['AdminPostsController@destroy',$post->id]]) !!}


    {!! Form::submit('Delete User',['class' => 'btn btn-danger  col-sm-2 pull-right ']) !!}

  </div>
</div>
<div class="row">
  @include('includes.form_error')
</div>
@stop