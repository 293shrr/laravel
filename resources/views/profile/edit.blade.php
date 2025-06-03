@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto text-white">
    <h2 class="text-2xl font-bold mb-4">Профиль пользователя</h2>

    <p><strong>Имя:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Роль:</strong> {{ $user->role }}</p>

    <hr class="my-6">

    <h3 class="text-xl font-semibold mb-2">Сменить пароль</h3>

    @if (session('status'))
        <div class="text-green-500 mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.password') }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="password" class="block">Новый пароль</label>
            <input type="password" name="password" class="w-full p-2 text-black">
            @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" class="w-full p-2 text-black">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Обновить пароль
        </button>
        <a href="{{ route('books.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        ← Назад к списку книг
        </a>
    </form>
</div>
@endsection
