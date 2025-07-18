<?php

namespace App\Http\Controllers;

use App\Models\MBTIResult;
use Illuminate\Http\Request;

class MBTIResultController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'mbti_type' => 'required|string',
            'description' => 'nullable|string',
            'taken_at' => 'nullable|date',
        ]);

        $result = MBTIResult::create($validated);

        return response()->json($result, 201);
    }

    public function show($id)
    {
        return MBTIResult::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $result = MBTIResult::findOrFail($id);

        $validated = $request->validate([
            'mbti_type' => 'sometimes|string',
            'description' => 'nullable|string',
            'taken_at' => 'nullable|date',
        ]);

        $result->update($validated);

        return response()->json($result);
    }

    public function destroy($id)
    {
        $result = MBTIResult::findOrFail($id);
        $result->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
