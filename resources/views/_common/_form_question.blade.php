			

			<div class="form-group row">
				{!! Form::label('author', 'Имя: *', ['class' => 'col-sm-2 col-form-label']) !!}
				<div class="col-sm-3">
					{!! Form::text('author', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="form-group row">
				{!! Form::label('email', 'E-mail: *', ['class' => 'col-sm-2 col-form-label']) !!}
				<div class="col-sm-3">
					{!! Form::text('email', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="form-group row">
				{!! Form::label('category_id', 'Категория', ['class' => 'col-sm-2 col-form-label']) !!}
				<div class="col-sm-3">
					{!! Form::select('category_id', $categoriesSelect, null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('name', 'Вопрос: *') !!}
				{!! Form::textarea('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
			</div>		