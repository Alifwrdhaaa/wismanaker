<?php

// Daftarkan autoloader Composer
require __DIR__ . '/../vendor/autoload.php';

// Ambil instansiasi aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Paksa Laravel menggunakan /tmp untuk semua penyimpanan file (karena Vercel bersifat Read-Only)
$app->useStoragePath('/tmp');

// Jalankan request
$app->handleRequest(Illuminate\Http\Request::capture());
