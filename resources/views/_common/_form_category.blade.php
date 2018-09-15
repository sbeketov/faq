			
<div class="form-group row">
    {!! Form::label('name', $text, ['class' => 'col-sm-2 col-form-label'])!!}
	
    <div class="col-sm-4">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
	
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>