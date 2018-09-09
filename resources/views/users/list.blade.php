@extends('dashboard')

@section('item')



<table class="table table-hover">

	<thead>

	  <tr>

		<th>Логин</th>

		<th></th>

	  </tr>

	</thead>

	<tbody>

		@foreach ($users as $user)

			<tr>

				<td>{{ $user->name }}</td>

				<td><a href="/user/{{ $user->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>

					{!! Form::open(['url' => '/user/'.$user->id, 'method' => 'delete']) !!}

					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}

					{!! Form::close() !!}

				</td>

			</tr>

		@endforeach

			<tr>

				<td colspan="2">

					{!! Form::open(['url' => '/user', 'method' => 'path']) !!}

					{!! Form::text('name', null, ['placeholder' => 'Логин', 'class' => 'form-control col-sm-3 mx-2']) !!}

					{!! Form::text('password', null, ['placeholder' => 'Пароль', 'class' => 'form-control col-sm-3 mx-2']) !!}



					{!! Form::submit('Добавить нового администратора', ['class' => 'btn btn-info mx-2']) !!}

					{!! Form::close() !!}

				</td>

			</tr>

	</tbody>

</table>



@include ('errors.list')

@stop

