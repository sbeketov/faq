@extends('dashboard')
@section('item')	
	<div class="cd-faq-items">	
		{!! Form::open(['route' => 'home']) !!}
			
			@include ($form)	

		{!! Form::close() !!}
	</div>

@include ('errors.list')
@stop