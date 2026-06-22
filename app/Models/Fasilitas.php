<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'facilities';
    protected $fillable = [
        'nama',
        'foto',
        'deskripsi',
    ];
}
