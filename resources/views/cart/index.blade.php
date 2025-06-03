<h1>Корзина</h1>

@if($cartItems->isEmpty())
    <p>Корзина пуста.</p>
    <a href="{{ route('books.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    ← Вернуться к книгам
                </a>
@else
    <ul>
        @foreach ($cartItems as $item)
            <li>
                {{ $item->book->title }} — {{ $item->quantity }} шт.
                <form action="{{ route('cart.remove', $item->book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
        
    </ul>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit">Оформить заказ</button>
        <a href="{{ route('books.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    ← Вернуться к книгам
                </a>
    </form>
    
@endif
