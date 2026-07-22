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
            'room_id'       => 'required|exists:rooms,id',
            'nama_pemesan'  => 'required|string|max:255',
            'nomor_hp'      => 'required|string|max:20',
            'checkin_date'  => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
            'jumlah_kamar'  => 'required|integer|min:1',
            'catatan'       => 'nullable|string|max:1000',
        ]);

        $room = \App\Models\Kamar::findOrFail($request->room_id);
        $checkin = $request->checkin_date;
        $checkout = $request->checkout_date;

        // Cek ketersediaan kamar pada rentang tanggal
        $overlappingBookings = Pemesanan::where('room_id', $room->id)
            ->where(function($query) use ($checkin, $checkout) {
                $query->whereBetween('checkin_date', [$checkin, $checkout])
                      ->orWhereBetween('checkout_date', [$checkin, $checkout])
                      ->orWhere(function($q) use ($checkin, $checkout) {
                          $q->where('checkin_date', '<=', $checkin)
                            ->where('checkout_date', '>=', $checkout);
                      });
            })->sum('jumlah_kamar');

        if ($overlappingBookings + $request->jumlah_kamar > $room->jumlah_unit) {
            return back()->withErrors(['jumlah_kamar' => 'Kamar tidak tersedia dalam jumlah tersebut pada tanggal yang dipilih. (Sisa: ' . max(0, $room->jumlah_unit - $overlappingBookings) . ' unit)'])->withInput();
        }

        Pemesanan::create($validated);

        return redirect()->route('pemesanan.index')->with('success', 'Jadwal booking berhasil ditambahkan.');
    }

    public function show(Pemesanan $pemesanan)
    {
        return redirect()->route('pemesanan.index');
    }

    public function edit(Pemesanan $pemesanan)
    {
        $booking = $pemesanan;
        $rooms = \App\Models\Kamar::all();
        return view('pemesanan.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'room_id'       => 'required|exists:rooms,id',
            'nama_pemesan'  => 'required|string|max:255',
            'nomor_hp'      => 'required|string|max:20',
            'checkin_date'  => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'jumlah_kamar'  => 'required|integer|min:1',
            'catatan'       => 'nullable|string|max:1000',
        ]);

        $room = \App\Models\Kamar::findOrFail($request->room_id);
        $checkin = $request->checkin_date;
        $checkout = $request->checkout_date;

        // Cek ketersediaan kamar pada rentang tanggal, abaikan pemesanan ini sendiri
        $overlappingBookings = Pemesanan::where('room_id', $room->id)
            ->where('id', '!=', $pemesanan->id)
            ->where(function($query) use ($checkin, $checkout) {
                $query->whereBetween('checkin_date', [$checkin, $checkout])
                      ->orWhereBetween('checkout_date', [$checkin, $checkout])
                      ->orWhere(function($q) use ($checkin, $checkout) {
                          $q->where('checkin_date', '<=', $checkin)
                            ->where('checkout_date', '>=', $checkout);
                      });
            })->sum('jumlah_kamar');

        if ($overlappingBookings + $request->jumlah_kamar > $room->jumlah_unit) {
            return back()->withErrors(['jumlah_kamar' => 'Kamar tidak tersedia dalam jumlah tersebut pada tanggal yang dipilih. (Sisa: ' . max(0, $room->jumlah_unit - $overlappingBookings) . ' unit)'])->withInput();
        }

        $pemesanan->update($validated);

        return redirect()->route('pemesanan.index')->with('success', 'Data booking berhasil diperbarui.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Data booking berhasil dihapus.');
    }
}
