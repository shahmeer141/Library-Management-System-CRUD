<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    // View all borrowed book records
    public function index()
    {
        $records = BorrowedBook::with(['member', 'book'])->get();

        return response()->json([
            'message' => 'Borrowed books retrieved successfully!',
            'data' => $records
        ], 200);
    }

    // Record a new borrow transaction
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        $record = BorrowedBook::create($validated);

        return response()->json([
            'message' => 'Borrow transaction recorded successfully!',
            'data' => $record
        ], 201);
    }

    // View a single borrow record
    public function show($id)
    {
        $record = BorrowedBook::with(['member', 'book'])->findOrFail($id);

        return response()->json([
            'message' => 'Borrowed book record retrieved successfully!',
            'data' => $record
        ], 200);
    }

    // Update return date or borrow info
    public function update(Request $request, $id)
    {
        $record = BorrowedBook::findOrFail($id);

        $validated = $request->validate([
            'return_date' => 'nullable|date',
        ]);

        $record->update($validated);

        return response()->json([
            'message' => 'Borrow record updated successfully!',
            'data' => $record
        ], 200);
    }

    // Delete a borrow record
    public function destroy($id)
    {
        $record = BorrowedBook::findOrFail($id);
        $record->delete();

        return response()->json([
            'message' => 'Borrow record deleted successfully!'
        ], 200);
    }
}
