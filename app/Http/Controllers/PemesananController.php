<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Pemesanan::with('kamar')->orderBy('checkin_date', 'desc')->paginate(15);
        return view('pemesanan.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = \App\Models\Kamar::all();
        return view('pemesanan.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'nama_pemesan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'catatan' => 'nullable|string',
        ]);

        Pemesanan::create($validated);

        return redirect()->route('bookings.index')->with('success', 'Jadwal booking berhasil ditambahkan.');
    }

    public function show(Booking $booking)
    {
        //
    }

    public function edit(Pemesanan $booking)
    {
        $rooms = \App\Models\Kamar::all();
        return view('pemesanan.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, Pemesanan $booking)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'nama_pemesan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'catatan' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Jadwal booking berhasil diupdate.');
    }

    public function destroy(Pemesanan $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Jadwal booking berhasil dihapus.');
    }
}
