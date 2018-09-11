
<h2>{{ $model->question->name}}</h2>	

<div class="form-group">
    
    {!! Form::hidden('referer', $_SERVER['HTTP_REFERER']) !!}

	{!! Form::label('answer', 'Редактировать ответ: ', ['class' => 'col-sm-2 col-form-label']) !!}

	{!! Form::textarea('answer', null, ['class' => 'form-control']) !!}

</div>

	<div class="form-group">

	{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}

</div>		