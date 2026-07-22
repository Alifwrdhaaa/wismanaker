<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'rooms';
    protected $fillable = [
        'nama',
        'harga',
        'jumlah_unit',
        'foto',
        'deskripsi',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'room_id');
    }

    public function getAvailableTodayAttribute()
    {
        $today = now()->format('Y-m-d');
        
        $bookedToday = $this->pemesanan()
            ->where('checkin_date', '<=', $today)
            ->where('checkout_date', '>', $today)
            ->sum('jumlah_kamar');
            
        return max(0, $this->jumlah_unit - $bookedToday);
    }
}
