
	<aside class="col-md-3">
		<nav class="nav flex-column list-group sticky-top">
    		@foreach ($categories as $category)
    
    			<a class="nav-link list-group-item list-group-item-action" href="#{{ $category->name }}">{{ $category->name }}</a>
    		
    		@endforeach
		</nav>
	</aside>
