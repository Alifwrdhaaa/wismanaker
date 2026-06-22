<?php

namespace App\Http\Controllers;

use App\Models\ProfilWisma;
use Illuminate\Http\Request;

class ProfilWismaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = ProfilWisma::first();
        return view('profil-wisma.index', compact('profile'));
    }

    public function create()
    {
        // Not used, using index directly
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tentang' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'alamat' => 'nullable|string',
            'maps_url' => 'nullable|string',
        ]);

        ProfilWisma::create($validated);

        return redirect()->route('wisma-profiles.index')->with('success', 'Profil berhasil disimpan.');
    }

    public function show(ProfilWisma $wismaProfile)
    {
        //
    }

    public function edit(ProfilWisma $wismaProfile)
    {
        return view('profil-wisma.edit', compact('wismaProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilWisma $wismaProfile)
    {
        $validated = $request->validate([
            'tentang' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'maps_url' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $wismaProfile->update($validated);

        return redirect()->route('wisma-profiles.index')->with('success', 'Profil berhasil diupdate.');
    }

    public function destroy(WismaProfile $wismaProfile)
    {
        $wismaProfile->delete();
        return redirect()->route('wisma-profiles.index')->with('success', 'Profil berhasil dihapus.');
    }
}
