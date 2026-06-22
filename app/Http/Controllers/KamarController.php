<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Kamar::latest()->paginate(10);
        return view('kamar.index', compact('rooms'));
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'jumlah_unit' => 'required|integer|min:1',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('rooms', 'public');
        }

        Kamar::create($validated);

        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function show(Room $room)
    {
        //
    }

    public function edit(Kamar $room)
    {
        return view('kamar.edit', compact('room'));
    }

    public function update(Request $request, Kamar $room)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'jumlah_unit' => 'required|integer|min:1',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($room->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($room->foto);
            }
            $validated['foto'] = $request->file('foto')->store('rooms', 'public');
        }

        $room->update($validated);

        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil diupdate.');
    }

    public function destroy(Kamar $room)
    {
        if ($room->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($room->foto);
        }
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
