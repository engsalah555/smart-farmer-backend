<?php

namespace Database\Seeders;

class ImageHelper
{
    /**
     * Download an image from URL and save to storage/app/public, or generate a clean SVG/GD fallback.
     */
    public static function download(string $url, string $relativeDestination, string $fallbackLabel = 'زرعة'): string
    {
        $storageDir = storage_path('app/public');
        $fullPath = $storageDir.'/'.ltrim($relativeDestination, '/');
        $dir = dirname($fullPath);

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        // If file already exists and valid, skip download
        if (file_exists($fullPath) && filesize($fullPath) > 1000) {
            return ltrim($relativeDestination, '/');
        }

        // Attempt download
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code === 200 && strlen($data) > 1500) {
            file_put_contents($fullPath, $data);

            return ltrim($relativeDestination, '/');
        }

        // Fallback: create placeholder image
        if (extension_loaded('gd')) {
            $img = imagecreatetruecolor(600, 400);
            $bgColor = imagecolorallocate($img, 16, 185, 129); // #10b981
            $textColor = imagecolorallocate($img, 255, 255, 255);
            imagefilledrectangle($img, 0, 0, 600, 400, $bgColor);
            imagestring($img, 5, 220, 190, $fallbackLabel, $textColor);
            imagejpeg($img, $fullPath, 85);
            imagedestroy($img);
        } else {
            file_put_contents($fullPath, 'SMART_FARMER_IMAGE');
        }

        return ltrim($relativeDestination, '/');
    }
}
