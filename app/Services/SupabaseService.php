<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SupabaseService
{
    protected string $url;
    protected string $key;

    public function __construct()
    {
        $this->url = config('services.supabase.url');
        $this->key = config('services.supabase.anon_key');
    }

    /**
     * Update a device in Supabase.
     */
    public function updateDevice(string $deviceId, array $data)
    {
        if (!$this->url || !$this->key) {
            Log::warning('Supabase credentials not configured.');
            return false;
        }

        try {
            $response = Http::withHeaders([
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => 'application/json',
                'Prefer' => 'return=minimal',
            ])->patch("{$this->url}/rest/v1/iot_devices?device_id=eq.{$deviceId}", $data);

            if ($response->failed()) {
                Log::error('Supabase Update Failed: ' . $response->body());
                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Supabase Exception: ' . $e->getMessage());
            return false;
        }
    }
}
