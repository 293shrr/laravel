@extends('layouts.app')

@section('content')
    <h2 class="text-white text-2xl mb-4">Мои заказы</h2>

    @forelse ($orders as $order)
        <div class="bg-white dark:bg-gray-800 p-4 rounded mb-4">
            <h3 class="text-lg font-semibold">Заказ №{{ $order->id }}</h3>
            <p class="text-sm text-gray-400">Дата: {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($order->items as $item)
                    <li>{{ $item['title'] }} — {{ $item['quantity'] }} шт.</li>
                @endforeach
            </ul>
            
        </div>
        
      
    @empty
        <p class="text-gray-300">У вас пока нет заказов.</p>
        <a href="{{ route('books.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ← Вернуться к книгам
        </a>
    @endforelse
    <a href="{{ route('books.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        ← Вернуться к книгам
    </a>
@endsection
