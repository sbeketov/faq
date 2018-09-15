@extends('layouts.app')
@section('content')

<H2 class="н2 text-center mb-4">{{ $message }}.</H2>

<a href="/" class="btn btn-info btn-block">Вернуться к {{ $back }}</a>

@endsection
