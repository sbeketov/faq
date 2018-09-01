<div class="row">
@include('_common._categories')
<section class="col-md-9">
	
	@foreach ($categories as $category)
	<div id="{{ $category->name }}">
		<h2 class="text-muted">{{ $category->name }}</h2>

		<div class="accordion" id="accordion">		

		@foreach ($category->questions as $question)

			<div class="card">
				<div class="card-header" id="heading{{ $question->id }}">
					<h5 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="{{ $question->name }}">
				        	{{ $question->name }}
				        </button>
					</h5>
				</div> <!-- card-header -->
									
				<div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="heading{{ $question->id }}" data-parent="#accordion">
					 
					@foreach ($question->answers as $answer)
						<div class="card-body">
							{{ $answer->answer }}
						</div>
					@endforeach
				</div> <!-- collapse -->
			</div> <!-- card -->
		@endforeach
	</div> <!-- accordion -->
	</div>	
	@endforeach
</section> <!--col-md-9-->
</div> <!--row-->