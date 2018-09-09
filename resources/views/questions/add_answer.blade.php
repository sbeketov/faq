@extends('dashboard')



@section('item')


<h2>Категория: {{ $question->category->name }}</h2>

<h3>Ворос: {{ $question->name }}</h3>


{!! Form::open(['url' => '/answer', 'method' => 'path']) !!}

{!! Form::hidden('question_id', $question->id) !!}

{!! Form::textarea('answer', null, ['class' => 'form-control']) !!}

<div class="form-check form-check-inline">
	{!! Form::radio('status', '1', ['class' => 'form-check-input']) !!}

	{!! Form::label('status', 'Опубликовать', ['class' => 'form-check-label']) !!}
</div>

<div class="form-check form-check-inline">
	{!! Form::radio('status', '2', ['class' => 'form-check-input']) !!}

	{!! Form::label('status', 'Скрыть', ['class' => 'form-check-label']) !!}
</div>

<div class="form-group">

	{!! Form::submit('Добавить', ['class' => 'btn btn-info mx-2']) !!}

</div>

{!! Form::close() !!}

@stop