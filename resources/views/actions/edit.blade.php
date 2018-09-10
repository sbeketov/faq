@extends('dashboard')

@section('item')	

	<div class="container">	

		{!! Form::model($model, ['method' => 'PATCH', 'action' => [$action, $model->id]]) !!}

			@include ($form)

		{!! Form::close() !!}

	</div>

@include ('errors.list')

@stop