<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Gate; // <-- Added this so we can check permissions!

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        Gate::authorize('create', Book::class); // Blocks non-admins
        return view('books.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Book::class); // Blocks non-admins

        $request->validate([
            'book_code' => 'required|unique:books,book_code',
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer|min:1900|max:2026',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        Gate::authorize('update', $book); // Blocks non-admins
        
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        Gate::authorize('update', $book); // Blocks non-admins

        $request->validate([
            'book_code' => 'required|unique:books,book_code,' . $id,
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer|min:1850|max:2026',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        Gate::authorize('delete', $book); // Blocks non-admins
        
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}