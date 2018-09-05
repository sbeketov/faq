@extends('dashboard')
@section('item')

<table class="table table-striped">
	<thead>
	  <tr>
		<th>Автор</th>
		<th>Email</th>
		<th>Вопрос</th>
		<th>Дата создания</th>
		<th>Статус</th>
		<th></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($questions as $question)
			<tr>
				<td>{{ $question->author }}</td>
				<td>{{ $question->email }}</td>
				<td>{{ $question->name }}</td>
				<td>{{ $question->created_at }}</td>
				<td>{{ $question->status }}</td>
				<td><a href="/question/{{ $question->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>
					{!! Form::open(['url' => '/question/'.$question->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
			<tr>
				<td colspan="6"><a href="question/create" class="btn btn-primary btn-lg btn-block">Добавить новый вопрос</a></td>
			</tr>
	</tbody>
</table>

@stop