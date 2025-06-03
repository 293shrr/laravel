<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends \App\Http\Controllers\Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show(Book $book) {
        return view('books.show', compact('book'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        Book::create($request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'year' => ['required', 'regex:/^\d{2,4}$/']
        ]));
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
