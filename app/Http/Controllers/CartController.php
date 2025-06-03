<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('book')
            ->where('user_id', auth()->id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Book $book)
    {
        $item = Cart::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'quantity' => 1,
            ]);
        }

        return back();
    }

    public function remove(Book $book)
    {
        Cart::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->delete();

        return back();
    }
}