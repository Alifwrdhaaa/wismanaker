<?php

use Illuminate\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

// Setup Vercel /tmp directory
$storagePath = '/tmp/storage';
if (!is_dir($storagePath)) {
    mkdir($storagePath.'/framework/views', 0777, true);
    mkdir($storagePath.'/framework/cache/data', 0777, true);
    mkdir($storagePath.'/framework/sessions', 0777, true);
    mkdir($storagePath.'/logs', 0777, true);
}

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath($storagePath);

$app->handleRequest(Request::capture());
