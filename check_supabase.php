<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Http;

$url = env('SUPABASE_URL') . '/rest/v1/sensor-data?limit=1';
$key = env('SUPABASE_ANON_KEY');

echo "Testing URL: $url\n";

$response = Http::withHeaders([
    'apikey' => $key,
    'Authorization' => 'Bearer ' . $key
])->get($url);

echo "Response Status: " . $response->status() . "\n";
echo "Response Body: " . json_encode($response->json(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
