@extends('dashboard')

@section('item')



<table class="table table-hover mb-5">

	<thead>

	  <tr>

		<th>Название категории</th>

		<th class="text-center">Всего вопросов</th>

		<th class="text-center">Опубликовано</th>

		<th class="text-center">Ожидает ответа</th>

		<th class="text-center">Скрыто</th>

		<th></th>

	  </tr>

	</thead>

	<tbody>
		@foreach ($categories as $category)
			<tr>

				<td>{{ $category->name }}</td>

				<td class="text-center">
				    @foreach ($category->questionsCount as $questionsCount)
				    	    <a href="/category/{{ $category->id }}" class="btn btn-primary">
				    	        {{ $questionsCount->aggregate }}
				    	    </a>      
			    	@endforeach
				</td>

				<td class="text-center">
				    @foreach ($category->questionsCount1 as $questionsCount)
    				    <a href="/category/{{ $category->id }}/1" class="btn btn btn-success">
			        	    {{ $questionsCount->aggregate }}
					    </a>
				    @endforeach
				</td class="text-center">

				<td class="text-center">
				    @foreach ($category->questionsCount0 as $questionsCount)
    				    <a href="/category/{{ $category->id }}/0" class="btn btn btn btn-warning">
    						{{ $questionsCount->aggregate }}
        				</a>
    				@endforeach
				</td>

				<td class="text-center">
				    @foreach ($category->questionsCount2 as $questionsCount)
				        <a href="/category/{{ $category->id }}/2" class="btn btn-dark">
    						{{ $questionsCount->aggregate }}
    				    </a>
    				@endforeach
				</td>

				<td>
				    <div class="row">
    				    <a href="/category/{{ $category->id }}/edit" class="btn btn-info mx-2 float-left">Изменить</a>
    
    					{!! Form::open(['url' => '/category/'.$category->id, 'method' => 'delete']) !!}
    
    					{!! Form::submit('Удалить', ['class' => 'btn btn-danger mx-2']) !!}
    
    					{!! Form::close() !!}
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@include ('actions.create')

@stop