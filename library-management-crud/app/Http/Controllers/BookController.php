<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display all books
    public function index()
    {
        $books = Book::all();
        return response()->json([
            'message' => 'Books retrieved successfully',
            'data' => $books
        ], 200);
    }

    // Add a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'available_copies' => 'required|integer|min:0',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book added successfully',
            'data' => $book
        ], 201);
    }

    // Show a single book by ID
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return response()->json([
            'message' => 'Book retrieved successfully!',
            'data' => $book
        ], 200);
    }

    // Update a book
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'published_year' => 'sometimes|integer',
            'available_copies' => 'sometimes|integer|min:0',
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully!',
            'data' => $book
        ], 200);
    }

    // Delete a book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ], 200);
    }
}
