<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Fasilitas::latest()->paginate(10);
        return view('fasilitas.index', compact('facilities'));
    }

    public function create()
    {
        return view('fasilitas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('facilities', 'public');
        }

        Fasilitas::create($validated);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function show(Fasilitas $fasilita)
    {
        //
    }

    public function edit(Fasilitas $fasilita)
    {
        $facility = $fasilita;
        return view('fasilitas.edit', compact('facility'));
    }

    public function update(Request $request, Fasilitas $fasilita)
    {
        $facility = $fasilita;
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($facility->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($facility->foto);
            }
            $validated['foto'] = $request->file('foto')->store('facilities', 'public');
        }

        $facility->update($validated);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diupdate.');
    }

    public function destroy(Fasilitas $fasilita)
    {
        $facility = $fasilita;
        if ($facility->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($facility->foto);
        }
        $facility->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
