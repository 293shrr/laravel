<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::get('/', fn() => redirect()->route('books.index'));

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{book}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


    
    Route::get('/profile', function () {
        return view('profile.edit', ['user' => Auth::user()]);
    })->name('profile.edit');

    Route::patch('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])
        ->name('profile.password');
    
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    
});

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');




require __DIR__.'/auth.php';