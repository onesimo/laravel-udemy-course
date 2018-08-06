@extends('layouts.admin')

@section('content')
  
  @if(Session::has('deleted_user'))
    <p class="bg-danger">{{session('deleted_user')}}</p>
  @endif

	<h1>users</h1>
	<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
 	
 	@if($users)
		
		@foreach($users as $user)
	  <tr>
        <td>{{$user->id}}</td> 
        <td><img height="50" src="{{!isset($user->photo) ? 'http://placehold.it/200x200' : $user->photo->file }}" alt=""></td>
        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{!isset($user->role->name) ? 'User has no role' : $user->role->name  }}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      	@endforeach

     @endif
    </tbody>
  </table>
@stop