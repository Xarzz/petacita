<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    // Menampilkan semua save milik user yang login
    public function index()
    {
        $savedItems = Saved::where('user_id', Auth::id())->get();
        return view('saved.index', compact('savedItems'));
    }

    // Simpan data ke saved
    public function store(Request $request)
    {
        $request->validate([
            'item_type' => 'required|string',
            'item_id'   => 'required|integer',
        ]);

        // Cek apakah sudah disimpan sebelumnya
        $exists = Saved::where('user_id', Auth::id())
            ->where('item_type', $request->item_type)
            ->where('item_id', $request->item_id)
            ->exists();

        if ($exists) {
            return back()->with('info', 'Item sudah disimpan sebelumnya.');
        }

        Saved::create([
            'user_id'   => Auth::id(),
            'item_type' => $request->item_type,
            'item_id'   => $request->item_id,
        ]);

        return back()->with('success', 'Item berhasil disimpan.');
    }

    // Hapus dari saved
    public function destroy($id)
    {
        $saved = Saved::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $saved->delete();

        return back()->with('success', 'Item berhasil dihapus dari simpanan.');
    }
}
