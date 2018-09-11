@extends('dashboard')
@section('item')

<h2 class="h2">{{ $category->name }}</h2>


<table class="table table-hover">
	<thead>
	  <tr>
	    <th class="w-10"></th>
		<th class="text-center w-15">Автор</th>
		<th class="text-center w-15">Email</th>
		<th class="text-center w-15">Дата создания</th>
		<th class="text-center w-15">Статус</th>
		<th class="w-10"></th>
		<th class="w-10"></th>
		<th class="w-10"></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($questions as $question)
			<tr class="table-primary">
			    <td>Инфо</td>
			   	<td class="text-center">{{ $question->author }}</td>
				<td class="text-center">{{ $question->email }}</td>
				<td class="text-center">{{ $question->created_at }}</td>
				<td class="text-center">{{ $status[$question->status] }}</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			<tr class="table-success">
			    <td>Вопрос:</td>
			    <td colspan="4">{{ $question->name }}</td>
	           <td>
	            	@if (empty($question['answer']))
					    <a href="/question/{{ $question->id }}" class="btn btn-info mx-1">Ответить</a>
					@endif
				</td>
			    <td>        
			        <a href="/question/{{ $question->id }}/edit" class="btn btn-info mx-1">Изменить</a>
				</td>
				<td>
					{!! Form::open(['url' => '/question/'.$question->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-1']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@if (!empty($question['answer']))
    		    <tr>
    		        <td>Ответ</td>
    			    <td colspan="4">{{ $question->answer['answer'] }}</td>
    			    <td></td>
    			    <td>
				    	<a href="/answer/{{ $question->answer['id'] }}/edit" class="btn btn-info mx-1">Изменить</a>
					</td>
					<td>        		
    					{!! Form::open(['url' => '/answer/'.$question->answer['id'], 'method' => 'delete']) !!}
    					{!! Form::hidden('url', $_SERVER['REQUEST_URI']) !!}
    					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-1']) !!}
    					{!! Form::close() !!}
    				</td>
    		    <tr>
    		@endif
		@endforeach
	</tbody>
</table>

@stop