<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function home()
    {
        $profile = \App\Models\ProfilWisma::first();
        $facilities = \App\Models\Fasilitas::take(4)->get();
        $rooms = \App\Models\Kamar::take(4)->get();
        $galleries = \App\Models\Galeri::take(6)->get();
        return view('publik.home', compact('profile', 'facilities', 'rooms', 'galleries'));
    }

    public function about()
    {
        $profile = \App\Models\ProfilWisma::first();
        return view('publik.about', compact('profile'));
    }

    public function facilities()
    {
        $facilities = \App\Models\Fasilitas::all();
        return view('publik.facilities', compact('facilities'));
    }

    public function gallery()
    {
        $galleries = \App\Models\Galeri::paginate(12);
        return view('publik.gallery', compact('galleries'));
    }

    public function rooms()
    {
        $rooms = \App\Models\Kamar::all();
        return view('publik.rooms', compact('rooms'));
    }

    public function roomDetail(\App\Models\Kamar $room)
    {
        $profile = \App\Models\ProfilWisma::first();
        $whatsappNumber = $profile ? $profile->whatsapp : '';
        
        // Fetch bookings to disable dates in calendar
        $bookings = \App\Models\Pemesanan::where('room_id', $room->id)
            ->where('checkout_date', '>=', now()->format('Y-m-d'))
            ->get(['checkin_date', 'checkout_date', 'jumlah_kamar']);
            
        $dateCounts = [];
        foreach ($bookings as $booking) {
            $start = \Carbon\Carbon::parse($booking->checkin_date);
            $end = \Carbon\Carbon::parse($booking->checkout_date);
            // Booking occupies the nights between check-in and check-out
            while ($start->lt($end)) {
                $dateStr = $start->format('Y-m-d');
                if (!isset($dateCounts[$dateStr])) {
                    $dateCounts[$dateStr] = 0;
                }
                $dateCounts[$dateStr] += $booking->jumlah_kamar ?? 1;
                $start->addDay();
            }
        }

        $fullyBookedDates = [];
        foreach ($dateCounts as $date => $count) {
            // Blokir tanggal jika total kamar yang dipesan sudah mencapai atau melebihi jumlah unit kamar fisik
            if ($count >= $room->jumlah_unit) {
                $fullyBookedDates[] = $date;
            }
        }

        $todayStr = now()->format('Y-m-d');
        $bookedToday = $dateCounts[$todayStr] ?? 0;
        // Hitung sisa kamar yang tersedia hari ini
        $availableToday = max(0, $room->jumlah_unit - $bookedToday);
        
        return view('publik.room_detail', compact('room', 'whatsappNumber', 'fullyBookedDates', 'availableToday'));
    }
}