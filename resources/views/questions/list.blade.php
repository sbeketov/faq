@extends('dashboard')
@section('item')

<h2 class="h2 mb-4">Вопросы без ответов</h2>

<table class="table table-hover">
	<thead>
	  <tr>
		<th class="text-center w-15">Автор</th>
		<th class="text-center w-15">Email</th>
		<th class="text-center w-25">Вопрос</th>
		<th class="text-center w-15">Категория</th>
		<th class="text-center w-15">Дата создания</th>
		<th class="w-5"></th>
		<th class="w-5"></th>
		<th class="w-5"></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($questions as $question)
			<tr>
				<td class="text-center">{{ $question->author }}</td>
				<td class="text-center">{{ $question->email }}</td>
				<td>{{ $question->name }}</td>
				<td class="text-center">{{ $question->category->name }}</td>
				<td class="text-center">{{ $question->created_at }}</td>
				<td>			    
				    <a href="/question/{{ $question->id }}" class="btn btn-info mx-2">Ответить</a>
				</td>
				<td>
				    <a href="/question/{{ $question->id }}/edit" class="btn btn-info mx-2">Изменить</a>
				</td>
				<td>
					{!! Form::open(['url' => '/question/'.$question->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach    
	</tbody>
</table>

@stop