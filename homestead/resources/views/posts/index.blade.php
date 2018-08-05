
@extends('layout.app')

@section('content')
	<ul>
		@foreach($posts as $post)
			<div class="image-container">
				<img height="100" src="{{$post->path}}">
			</div>
			<li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
		@endforeach
	</ul>
@endsection
 

