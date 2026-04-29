<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Factory;

class FirebaseService
{
    protected Database $database;

    public function __construct()
    {
        $credentialsPath = config('services.firebase.credentials_path');
        $databaseUrl = config('services.firebase.database_url');

        // Ensure the path is absolute
        if (! str_starts_with($credentialsPath, '/') && ! str_contains($credentialsPath, ':')) {
            $credentialsPath = base_path($credentialsPath);
        }

        try {
            $factory = (new Factory)
                ->withServiceAccount($credentialsPath)
                ->withDatabaseUri('https://'.rtrim(str_replace('https://', '', $databaseUrl), '/'));

            $this->database = $factory->createDatabase();
        } catch (\Exception $e) {
            Log::error('Firebase Initialization Error: '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Update data in Realtime Database.
     */
    public function update(string $path, array $data)
    {
        try {
            $this->database->getReference($path)->update($data);

            return true;
        } catch (\Exception $e) {
            Log::error("Firebase RTDB Update Error [{$path}]: ".$e->getMessage());
            throw $e; // Throw for debugging
        }
    }

    /**
     * Get data from Realtime Database.
     */
    public function get(string $path)
    {
        try {
            return $this->database->getReference($path)->getValue();
        } catch (\Exception $e) {
            Log::error("Firebase RTDB Get Error [{$path}]: ".$e->getMessage());
            throw $e; // Throw for debugging
        }
    }

    /**
     * Set data (overwrite) in Realtime Database.
     */
    public function set(string $path, $data)
    {
        try {
            $this->database->getReference($path)->set($data);

            return true;
        } catch (\Exception $e) {
            Log::error("Firebase RTDB Set Error [{$path}]: ".$e->getMessage());
            throw $e; // Throw for debugging
        }
    }
}
