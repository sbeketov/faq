@extends('dashboard')
@section('item')	
	<div class="cd-faq-items">	
		{!! Form::open(['method' => 'POST', 'url' => 'question']) !!}
			
			@include ($form)

		{!! Form::close() !!}
	</div>

@include ('errors.list')
@stop