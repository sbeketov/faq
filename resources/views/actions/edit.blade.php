@extends('dashboard')
@section('item')	
	<div class="cd-faq-items">	
		{!! Form::model($model, ['method' => 'PATCH', 'action' => [$action, $model->id]]) !!}
				
			@include ($form)

		{!! Form::close() !!}
	</div>
@include ('errors.list')
@stop