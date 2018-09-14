@extends('dashboard')



@section('item')


<h2 class="h2">Категория: {{ $question->category->name }}</h2>

<h3 class="h3 mb-3">Ворос: {{ $question->name }}</h3>

@include('actions.create')

@stop