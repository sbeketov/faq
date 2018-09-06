@extends('dashboard')

@section('item')

<h2>{{ $question->name }}</h2>

{!! Form::open(['url' => '/answer', 'method' => 'path']) !!}
{!! Form::hidden('question_id', $question->id) !!}
<div class="form-group row">
	{!! Form::label('status', 'Статус', ['class' => 'col-sm-2 col-form-label']) !!}
	<div class="col-sm-3">
		{!! Form::select('status', $status , Null, ['class' => 'form-control'])!!}
    </div>
</div>

{!! Form::textarea('answer', null, ['placeholder' => 'Ответ', 'class' => 'form-control']) !!}

{!! Form::submit('Добавить', ['class' => 'btn btn-info mx-2']) !!}

{!! Form::close() !!}

@stop