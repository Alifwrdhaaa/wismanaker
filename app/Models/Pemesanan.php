<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'room_id',
        'nama_pemesan',
        'nomor_hp',
        'checkin_date',
        'checkout_date',
        'catatan',
    ];

    protected $casts = [
        'checkin_date' => 'date',
        'checkout_date' => 'date',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'room_id');
    }
}
