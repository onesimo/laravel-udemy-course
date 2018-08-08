@extends('layouts.admin')

@section('content')

<h1>Media</h1>

<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Created</th>
			<th> </th>
		</tr>
	</thead>

	@if($photos)
		
		@foreach($photos as $photo)
		<tbody>
			<tr>
				<td>{{$photo->id}}</td>
				<td><img height="50" src="{{$photo->file ? $photo->file : ''}}"></td>
				<td>{{$photo->created_at}}</td>
				<td>{{$photo->email}}</td>
				<td>
					{!! Form::open(['method'=>'DELETE', 'action' => ['AdminMediasController@destroy',$photo->id] ]) !!} 

					  
					 <div class="form-group">

					  {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
					  
					 </div>

					 {!! Form::close() !!}
				</td>
			</tr>
		</tbody>
		@endforeach
	@endif
</table>
@stop