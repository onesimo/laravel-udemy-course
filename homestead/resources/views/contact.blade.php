
@extends('layout.app')

@section('content')

    <h1>Contact page</h1>

    @if (count($people))

    	@foreach($people as $person)
    		<li>{{$person}}</li>
    		
    	@endforeach

    @endif

@stop

@section('footer')
  
@stop

