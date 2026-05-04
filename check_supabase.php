<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Http;

$url = env('SUPABASE_URL') . '/rest/v1/iot_devices';
$key = env('SUPABASE_ANON_KEY');

$response = Http::withHeaders([
    'apikey' => $key,
    'Authorization' => 'Bearer ' . $key
])->get($url);

echo json_encode($response->json(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
