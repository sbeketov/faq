			

		

			<div class="form-group row">
				{!! Form::label('answer', 'Ответ: ', ['class' => 'col-sm-2 col-form-label']) !!}
				<div class="col-sm-3">
					{!! Form::text('answer', null, ['class' => 'form-control']) !!}
				</div>
			</div>

				<div class="form-group">
				{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
			</div>		