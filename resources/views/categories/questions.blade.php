@extends('dashboard')
@section('item')
<h2>{{ $category->name }}</h2>

<table class="table table-hover">
	<thead>
	  <tr>
	    <th></th>
		<th>Автор</th>
		<th>Email</th>
		<th>Дата создания</th>
		<th>Статус</th>
		<th></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($category->questions as $question)
			<tr>
			    <td>Инфо</td>
			   	<td>{{ $question->author }}</td>
				<td>{{ $question->email }}</td>
				<td>{{ $question->created_at }}</td>
				<td>{{ $status[$question->status] }}</td>
						</tr>
			<tr>
			    <td>Вопрос</td>
			    <td colspan="4">{{ $question->name }}</td>
			    <td><a href="/question/{{ $question->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>
					{!! Form::open(['url' => '/question/'.$question->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			    @foreach ($question->answers as $answer)
    			    <tr>
    			        <td>Ответ</td>
    				    <td colspan="4">{{ $answer->answer }}</td>
    				    <td><a href="/answer/{{ $answer->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>
        					{!! Form::open(['url' => '/answer/'.$answer->id, 'method' => 'delete']) !!}
        					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
        					{!! Form::close() !!}
        				</td>
    			    <tr>
		        @endforeach		
		@endforeach
	</tbody>
</table>

@stop