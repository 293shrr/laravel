@extends('layouts.app')
@section('content')
    <h2 class="text-white" >Добавить книгу</h2>
    @include('books.form')
    <a href="{{ route('books.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        ← Назад к списку книг
    </a>
</a>
@endsection
