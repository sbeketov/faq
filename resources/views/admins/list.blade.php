@extends('index')
@section('content')

<table class="table table-hover">
	<thead>
	  <tr>
		<th>Логин</th>
		<th>Пароль</th>
		<th></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($admins as $admin)
			<tr>
				<td>{{ $admin->login }}</td>
				<td>{{ $admin->password }}</td>
				<td><a href="/admin/{{ $admin->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>
					{!! Form::open(['url' => '/admin/'.$admin->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
			<tr>
				<td colspan="3">
					{!! Form::open(['url' => '/admin', 'method' => 'path']) !!}
					{!! Form::text('login', null, ['placeholder' => 'Логин', 'class' => 'form-control col-sm-3 mx-2']) !!}
					{!! Form::text('password', null, ['placeholder' => 'Пароль', 'class' => 'form-control col-sm-3 mx-2']) !!}

					{!! Form::submit('Добавить нового администратора', ['class' => 'btn btn-info mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
	</tbody>
</table>
@stop