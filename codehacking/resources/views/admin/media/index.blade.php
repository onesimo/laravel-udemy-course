@extends('layouts.admin')

@section('content')

<h1>Media</h1>
	<form action="delete/media" method="post" class="form-inline">
		{{csrf_field()}}
		{{method_field('delete')}}

<table class="table">
	<thead>
		<tr>
			<th><input type="checkbox" id="options"></th>
			<th>Id</th>
			<th>Name</th>
			<th>Created</th>
			 
		</tr>
	</thead>

	@if($photos)

	

		<div class="form-group">
			<select name="check_box_array" id="" class="form-group">
				<option value="">Delete</option>
			</select>
		</div> 
		<div class="form-group">
			 <input type="submit" name="delete_all" class="btn-primary">
		</div>
		
		@foreach($photos as $photo)
		<tbody>
			<tr>
				<td><input class="checkBoxes" type="checkbox" name="check_box_array[]" value="{{$photo->id}}"></td>
				<td>{{$photo->id}}</td>
				<td><img height="50" src="{{$photo->file ? $photo->file : ''}}"></td>
				<td>{{$photo->created_at}}</td>
				<td>{{$photo->email}}</td>
				<!-- <td>
					<input type="hidden" name="photo" value="{{$photo->id}}">
					<div class="form-group">
						<input type="submit" name="delete_single[{{$photo->id}}]" value="Delete" class="btn btn-danger">
					</div>
				</td> -->
			</tr>
		</tbody>
		@endforeach
	@endif
</table>
</form>

@stop

@section('scripts')


<script>
	$(document).ready(function(){
		 $('#options').click(function(){

		 	if(this.checked){
			 	 $('.checkBoxes').each(function(){
			 	 	this.checked = true;
			 	 });
		 	}else{
		 		$('.checkBoxes').each(function(){
			 	 	this.checked = false;
			 	 });
		 	}
		 });
	});

</script>

@stop