<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

// Ambil instansiasi aplikasi Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';

// Buat struktur folder sementara di /tmp khusus untuk Vercel
$storagePath = '/tmp/storage';
$directories = [
    '/framework/views',
    '/framework/cache/data',
    '/framework/sessions',
    '/logs',
];

foreach ($directories as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0777, true);
    }
}

// Paksa Laravel menggunakan /tmp/storage
$app->useStoragePath($storagePath);

// Jalankan request
$app->handleRequest(Illuminate\Http\Request::capture());
