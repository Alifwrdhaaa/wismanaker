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

        \App\Models\ProfilWisma::create([
            'tentang' => 'Wisma Karya Jasa merupakan penginapan...',
            'whatsapp' => '+62 857-9875-6544',
            'alamat' => 'Wisma Karya Jasa Ciloto, Jl. Raya Puncak Ciloto KM. BD 88, Cianjur 43253',
        ]);

        // Dummy Kamar
        $kamar1 = \App\Models\Kamar::create([
            'nama' => 'Presidential Suite',
            'harga' => 1500000,
            'jumlah_unit' => 4,
            'deskripsi' => 'Kamar paling mewah dengan pemandangan pegunungan.'
        ]);

        $kamar2 = \App\Models\Kamar::create([
            'nama' => 'Deluxe Room A1',
            'harga' => 750000,
            'jumlah_unit' => 10,
            'deskripsi' => 'Kamar nyaman untuk keluarga kecil.'
        ]);

        $kamar3 = \App\Models\Kamar::create([
            'nama' => 'Standard Room B1',
            'harga' => 400000,
            'jumlah_unit' => 20,
            'deskripsi' => 'Fasilitas standar dengan harga terjangkau.'
        ]);

        // Dummy Fasilitas
        \App\Models\Fasilitas::create([
            'nama' => 'Kolam Renang Air Hangat',
            'deskripsi' => 'Buka dari jam 6 pagi hingga 8 malam.'
        ]);
        \App\Models\Fasilitas::create([
            'nama' => 'Restoran Bintang Lima',
            'deskripsi' => 'Menyediakan hidangan lokal dan internasional.'
        ]);
        \App\Models\Fasilitas::create([
            'nama' => 'Ruang Rapat Eksekutif',
            'deskripsi' => 'Kapasitas 50 orang dengan proyektor 4K.'
        ]);

        // Dummy Pemesanan
        \App\Models\Pemesanan::create([
            'room_id' => $kamar2->id,
            'nama_pemesan' => 'Bapak Budi Santoso',
            'nomor_hp' => '081234567890',
            'checkin_date' => now(),
            'checkout_date' => now()->addDays(3),
            'catatan' => 'Minta tambahan handuk.'
        ]);
        \App\Models\Pemesanan::create([
            'room_id' => $kamar1->id,
            'nama_pemesan' => 'Ibu Siti Aminah',
            'nomor_hp' => '089876543210',
            'checkin_date' => now()->subDays(1),
            'checkout_date' => now()->addDays(1),
            'catatan' => 'Check in terlambat jam 9 malam.'
        ]);

        // Dummy Galeri
        \App\Models\Galeri::create([
            'judul' => 'Tampak Depan Wisma',
            'foto' => 'dummy/tampak-depan.jpg'
        ]);
        \App\Models\Galeri::create([
            'judul' => 'Suasana Lobi Utama',
            'foto' => 'dummy/lobi.jpg'
        ]);
    }
}
