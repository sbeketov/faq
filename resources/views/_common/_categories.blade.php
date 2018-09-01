
	<aside class="col-md-3">
		<div id="list-example" class="list-group sticky-top">
		@foreach ($categories as $category)

			<a class="list-group-item list-group-item-action" href="#{{ $category->name }}">{{ $category->name }}</a>
		
		@endforeach
		<a class="list-group-item list-group-item-action" href="category/create">+Добавить категорию</a>
		</div> <!-- list-group -->
	</aside>
