<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    // Ambil semua goals user yang sedang login
    public function index()
    {
        $goals = Goal::where('user_id', Auth::id())->get();
        return response()->json($goals);
    }

    // Simpan goal baru
    public function store(Request $request)
    {
        $request->validate([
            'goal_category' => 'required|string',
            'goal_title' => 'required|string',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $goal = Goal::create([
            'user_id' => Auth::id(),
            'goal_category' => $request->goal_category,
            'goal_title' => $request->goal_title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => 'active',
        ]);

        return response()->json($goal, 201);
    }

    // Update goal
    public function update(Request $request, $id)
    {
        $goal = Goal::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $goal->update($request->only([
            'goal_category',
            'goal_title',
            'description',
            'deadline',
            'status'
        ]));

        return response()->json($goal);
    }

    // Hapus goal
    public function destroy($id)
    {
        $goal = Goal::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $goal->delete();

        return response()->json(['message' => 'Goal deleted.']);
    }
}
