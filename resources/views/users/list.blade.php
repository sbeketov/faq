@extends('dashboard')

@section('item')

<h2 class="h2 mb-4">Администраторы</h2>

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


	</tbody>

</table>

@include ('actions.create')

@stop

