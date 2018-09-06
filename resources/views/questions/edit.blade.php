@extends('layouts.app')
@section('item')	
	<div class="cd-faq-items">	
		{!! Form::model($question, ['method' => 'PATCH', 'action' => ['QuestionsController@update', $question->id]]) !!}
				
			@include ($form)

		{!! Form::close() !!}
	</div>
@include ('errors.list')
@stop