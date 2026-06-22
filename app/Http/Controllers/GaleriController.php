<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Galeri::latest()->paginate(12);
        return view('galeri.index', compact('galleries'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|max:2048',
        ]);

        $validated['foto'] = $request->file('foto')->store('galleries', 'public');

        Galeri::create($validated);

        return redirect()->route('galleries.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function show(Galeri $gallery)
    {
        //
    }

    public function edit(Galeri $gallery)
    {
        return view('galeri.edit', compact('gallery'));
    }

    public function update(Request $request, Galeri $gallery)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->foto);
            $validated['foto'] = $request->file('foto')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('galleries.index')->with('success', 'Foto galeri berhasil diupdate.');
    }

    public function destroy(Galeri $gallery)
    {
        if ($gallery->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->foto);
        }
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
