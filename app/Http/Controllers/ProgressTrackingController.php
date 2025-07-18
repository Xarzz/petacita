<?php

namespace App\Http\Controllers;

use App\Models\ProgressTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressTrackingController extends Controller
{
    public function index()
    {
        $trackings = ProgressTracking::where('user_id', Auth::id())->get();
        return response()->json($trackings);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'target_date' => 'nullable|date',
        ]);

        $tracking = ProgressTracking::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'target_date' => $request->target_date,
        ]);

        return response()->json($tracking, 201);
    }

    public function update(Request $request, $id)
    {
        $tracking = ProgressTracking::where('user_id', Auth::id())->findOrFail($id);

        $tracking->update($request->only([
            'title', 'description', 'status', 'target_date'
        ]));

        return response()->json($tracking);
    }

    public function destroy($id)
    {
        $tracking = ProgressTracking::where('user_id', Auth::id())->findOrFail($id);
        $tracking->delete();

        return response()->json(['message' => 'Progress deleted']);
    }
}
