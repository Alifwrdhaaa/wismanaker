<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Wisma',
            'email' => 'admin@wismakaryajasa.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\WismaProfile::create([
            'tentang' => 'Wisma Karya Jasa merupakan penginapan...',
            'whatsapp' => '+62 857-9875-6544',
            'alamat' => 'Wisma Karya Jasa Ciloto, Jl. Raya Puncak Ciloto KM. BD 88, Cianjur 43253',
        ]);
    }
}
