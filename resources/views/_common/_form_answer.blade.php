
<h2>{{ $model->question->name}}</h2>	

<div class="form-group">
    
    {!! Form::hidden('category_id', $model->question->category_id) !!}

	{!! Form::label('answer', 'Редактировать ответ: ', ['class' => 'col-sm-2 col-form-label']) !!}

	{!! Form::textarea('answer', null, ['class' => 'form-control']) !!}

</div>

	<div class="form-group">

	{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}

</div>		