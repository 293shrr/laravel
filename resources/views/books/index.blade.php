@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-white">Список книг</h1> 
    @auth
        <a class="text-2xl font text-white underline" href="{{ route('books.create') }}">Добавить книгу</a>
    @endauth

    <ul>
        @foreach ($books as $book)
            <div class="mb-4 p-4 border rounded text-white">
                <h3 class="text-xl font-semibold">{{ $book->title }}</h3>
                <p>Автор: {{ $book->author }}</p>
                <p>Жанр: {{ $book->genre }}</p>
                <p>Год: {{ $book->year }}</p>

                <div class="mt-2 flex gap-2">
                    <a href="{{ route('books.edit', $book) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Редактировать</a>

                    <form method="POST" action="{{ route('books.destroy', $book) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded" onclick="return confirm('Удалить книгу?')">Удалить</button>
                    </form>

                    <form method="POST" action="{{ route('cart.add', $book) }}">
                        @csrf
                        <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">В корзину</button>
                    </form>
                </div>
            </div>
        @endforeach
    </ul>
@endsection
