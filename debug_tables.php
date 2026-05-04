<?php
$content = file_get_contents('.env');
preg_match('/SUPABASE_ANON_KEY=(.*)/', $content, $matches);
$key = trim($matches[1]);
preg_match('/SUPABASE_URL=(.*)/', $content, $matches);
$baseUrl = trim($matches[1]);

function check($url, $key, $label) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $key,
        'Authorization: Bearer ' . $key
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    echo "$label: " . $res . "\n\n";
    
    $data = json_decode($res, true);
    if (isset($data[0])) {
        echo "COLUMNS FOR $label: " . implode(", ", array_keys($data[0])) . "\n\n";
    }
}

echo "--- CHECKING SUPABASE TABLES ---\n";
check($baseUrl . "/rest/v1/sensor-data?limit=1&order=id.desc", $key, "sensor-data");
check($baseUrl . "/rest/v1/relay-log?limit=1&order=id.desc", $key, "relay-log");
check($baseUrl . "/rest/v1/iot_devices?device_id=eq.ESP32-MASTER-001", $key, "iot_devices");
