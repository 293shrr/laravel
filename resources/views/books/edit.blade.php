@extends('layouts.app')
@section('content')
    <h2 class="text-white">Редактировать книгу</h2>
    @include('books.form')
    <a href="{{ route('books.index') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ← Назад ко всем книгам
    </a>
@endsection
