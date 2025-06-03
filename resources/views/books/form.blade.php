<form method="POST" action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}">
    @csrf
    @if(isset($book)) @method('PUT') @endif

    <input name="title" placeholder="Название" value="{{ old('title', $book->title ?? '') }}">
    <input name="author" placeholder="Автор" value="{{ old('author', $book->author ?? '') }}">
    <input name="genre" placeholder="Жанр" value="{{ old('genre', $book->genre ?? '') }}">
    <input name="year" placeholder="Год" value="{{ old('year', $book->year ?? '') }}">
    <button class="text-white" type="submit">{{ isset($book) ? 'Обновить' : 'Создать' }}</button>
</form>
