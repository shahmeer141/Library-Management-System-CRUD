<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Get all members
    public function index()
    {
        $members = Member::all();

        return response()->json([
            'message' => 'Members retrieved successfully',
            'data' => $members
        ], 200);
    }

    // Add a new member
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'membership_date' => 'required|date',
        ]);

        $member = Member::create($validated);

        return response()->json([
            'message' => 'Member added successfully',
            'data' => $member
        ], 201);
    }

    // Get a specific member
    public function show($id)
    {
        $member = Member::findOrFail($id);

        return response()->json([
            'message' => 'Member retrieved successfully',
            'data' => $member
        ], 200);
    }

    // Update member details
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:members,email,' . $id,
            'membership_date' => 'sometimes|date',
        ]);

        $member->update($validated);

        return response()->json([
            'message' => 'Member updated successfully',
            'data' => $member
        ], 200);
    }

    // Delete a member
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json([
            'message' => 'Member deleted successfully'
        ], 200);
    }
}
