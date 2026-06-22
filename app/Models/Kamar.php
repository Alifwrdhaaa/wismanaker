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
}
