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
        return view('profil-wisma.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // Smart extract src from iframe if admin pastes full iframe
        if (!empty($input['maps_url']) && preg_match('/src="([^"]+)"/', $input['maps_url'], $matches)) {
            $input['maps_url'] = $matches[1];
            $request->replace($input);
        }

        $validated = $request->validate([
            'tentang' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'alamat' => 'nullable|string',
            'maps_url' => 'nullable|url',
        ]);

        ProfilWisma::create($validated);

        return redirect()->route('profil-wisma.index')->with('success', 'Profil berhasil disimpan.');
    }

    public function show(ProfilWisma $profil_wisma)
    {
        //
    }

    public function edit(ProfilWisma $profil_wisma)
    {
        $wismaProfile = $profil_wisma;
        return view('profil-wisma.edit', compact('wismaProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilWisma $profil_wisma)
    {
        $wismaProfile = $profil_wisma;
        
        $input = $request->all();
        // Smart extract src from iframe if admin pastes full iframe
        if (!empty($input['maps_url']) && preg_match('/src="([^"]+)"/', $input['maps_url'], $matches)) {
            $input['maps_url'] = $matches[1];
            $request->replace($input);
        }

        $validated = $request->validate([
            'tentang' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'maps_url' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $wismaProfile->update($validated);

        return redirect()->route('profil-wisma.index')->with('success', 'Profil berhasil diupdate.');
    }

    public function destroy(ProfilWisma $profil_wisma)
    {
        $wismaProfile = $profil_wisma;
        $wismaProfile->delete();
        return redirect()->route('profil-wisma.index')->with('success', 'Profil berhasil dihapus.');
    }
}
