<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = auth()->user();
        $cartItems = \App\Models\Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста.');
        }

        $items = $cartItems->map(function ($item) {
            return [
                'book_id' => $item->book_id,
                'title' => $item->book->title ?? '',
                'quantity' => $item->quantity ?? 1,
            ];
        });

        \App\Models\Order::create([
            'user_id' => $user->id,
            'items' => $items->toArray(),
        ]);

        // Очистка корзины
        \App\Models\Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно оформлен!');
    }


    public function show(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);
        return view('orders.show', compact('order'));
    }

    public function index()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())->get();
        return view('orders.index', compact('orders'));
    }


}
