{!! Form::hidden('referer', $_SERVER['HTTP_REFERER']) !!}
{!! Form::hidden('question_id', $question->id) !!}

<div class="form-group">
{!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <div class="form-check form-check-inline">
        {!! Form::radio('status', '1', ['class' => 'form-check-input']) !!}
        {!! Form::label('status', 'Опубликовать', ['class' => 'form-check-label']) !!}
    </div>

    <div class="form-check form-check-inline">
        {!! Form::radio('status', '2', ['class' => 'form-check-input']) !!}
        {!! Form::label('status', 'Скрыть', ['class' => 'form-check-label']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-info mx-2']) !!}
</div>
