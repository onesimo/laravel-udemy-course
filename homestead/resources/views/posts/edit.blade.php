
@extends('layout.app')

@section('content')
  
 <h1>edit post</h1>
 <form method="post" action="/posts/{{$post->id}}">
 	<input type="hidden" name="_method" value="PUT">
 	<input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
 	{{csrf_field()}}
 	<input type="submit" name="submit" value="UPDATE">
 </form>

 <form action="/posts/{{$post->id}}" method="post">
 <input type="hidden" name="_method" value="DELETE"> 
 	{{csrf_field()}}
 	<input type="submit" value="DELETE">
 </form>
@endsection
 

