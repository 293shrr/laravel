@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-3xl font-bold text-white mb-4">{{ $book->title }}</h1>
        <p class="text-white">Автор: {{ $book->author }}</p>
        <p class="text-white">Жанр: {{ $book->genre }}</p>
        <p class="text-white">Год: {{ $book->year }}</p>

        <a href="{{ route('books.index') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ← Назад ко всем книгам
        </a>
    </div>
@endsection
