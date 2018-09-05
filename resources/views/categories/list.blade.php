@extends('dashboard')
@section('item')

<table class="table table-hover">
	<thead>
	  <tr>
		<th>Название категории</th>
		<th>Опубликовано</th>
		<th>Ожидает ответа</th>
		<th>Скрыто</th>
		<th></th>
	  </tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
			<tr>
				<td>{{ $category->name }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td><a href="/category/{{ $category->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>
					{!! Form::open(['url' => '/category/'.$category->id, 'method' => 'delete']) !!}
					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
			<tr>
				<td colspan="5">
					{!! Form::open(['url' => '/category', 'method' => 'path']) !!}
					{!! Form::text('name', null, ['placeholder' => 'Название категории', 'class' => 'form-control col-sm-3']) !!}
					{!! Form::submit('Добавить новую категорию', ['class' => 'btn btn-info mx-2']) !!}
					{!! Form::close() !!}
			</tr>
			
			@include ('errors.list')
	</tbody>
</table>

@stop