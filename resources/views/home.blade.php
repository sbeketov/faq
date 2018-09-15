@extends('layouts.app')

@section('content')

<div class="text-right"><a href="/category">Для администраторов</a></div>

<div class="row">

    @include('_common._categories')

    <section class="col-md-9">
        <div class="mb-5">
            @foreach ($categories as $category)
                <div id="{{ $category->name }}">

                    <h2 class="text-muted">{{ $category->name }}</h2>

                    <div class="accordion" id="accordion">
                        @foreach ($category->questions as $question)
                            <div class="card">

                                <div class="card-header" id="heading{{ $question->id }}">

                                    <h5 class="mb-0">
                                        <button class="btn btn-link inline text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="{{ $question->name }}" style="white-space: normal">
                                            {{ $question->name }}
                                        </button>
                                    </h5>
                                </div> <!-- card-header -->

                                <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="heading{{ $question->id }}" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $question->answer['answer'] }}
                                    </div>
                                </div> <!-- collapse -->
                            </div> <!-- card -->
                        @endforeach
                    </div> <!-- accordion -->
                </div>
            @endforeach
        </div>

        <h2 class="h2 text-center mb-3">Ваш вопрос:</h2>

        @include('actions.create')
    </section> <!--col-md-9-->
</div> <!--row-->

@endsection
