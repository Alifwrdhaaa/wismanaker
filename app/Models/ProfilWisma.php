<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilWisma extends Model
{
    protected $table = 'wisma_profiles';
    protected $fillable = [
        'tentang',
        'whatsapp',
        'instagram',
        'tiktok',
        'alamat',
        'maps_url',
    ];
}
