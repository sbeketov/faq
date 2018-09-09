@extends('dashboard')
@section('item')

<table class="table table-hover">
	<thead>
	  <tr>
		<th>Автор</th>
		<th>Email</th>
		<th>Вопрос</th>
		<th>Категория</th>
		<th>Дата создания</th>
		<th></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($questions as $question)
			<tr>
				<td>{{ $question->author }}</td>
				<td>{{ $question->email }}</td>
				<td>{{ $question->name }}</td>
				<td>{{ $question->category->name }}</td>
				<td>{{ $question->created_at }}</td>
				<td><a href="/question/{{ $question->id }}" class="btn btn-info mx-2 float-left">Ответить</a>
				    <a href="/question/{{ $question->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>

					{!! Form::open(['url' => '/question/'.$question->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach    
	</tbody>
</table>

@stop