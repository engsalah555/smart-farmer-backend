<?php

namespace App\Services;

use App\Models\CropGuide;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CropGuideService
{
    /**
     * Search for a crop guide locally or via AI.
     */
    public function searchGuide(string $query)
    {
        // 1. Check local DB
        $existing = CropGuide::where('name', 'LIKE', "%{$query}%")
            ->orWhere('scientific_name', 'LIKE', "%{$query}%")
            ->first();

        if ($existing) {
            return [
                'guide' => $existing,
                'source' => 'database',
            ];
        }

        // 2. Fetch image from Wikipedia
        $imageUrl = $this->fetchWikiImage($query);

        // 3. AI Search (Gemini)
        $plantData = $this->fetchGeminiDetails($query);

        if ($plantData && isset($plantData['name'])) {
            $newGuide = CropGuide::create([
                'name' => $plantData['name'],
                'scientific_name' => $plantData['scientific_name'] ?? null,
                'description' => $plantData['description'] ?? null,
                'planting_season' => $plantData['planting_season'] ?? null,
                'water_needs' => $plantData['water_needs'] ?? null,
                'fertilizer_needs' => $plantData['fertilizer_needs'] ?? null,
                'harvest_time' => $plantData['harvest_time'] ?? null,
                'image_url' => $imageUrl,
            ]);

            return [
                'guide' => $newGuide,
                'source' => 'gemini_api',
            ];
        }

        return null;
    }

    protected function fetchWikiImage($query)
    {
        $imageUrl = 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&q=80';
        try {
            $wikiResponse = Http::timeout(10)->get('https://ar.wikipedia.org/api/rest_v1/page/summary/'.urlencode($query));
            if ($wikiResponse->successful() && isset($wikiResponse->json()['thumbnail']['source'])) {
                $imageUrl = $wikiResponse->json()['thumbnail']['source'];
            }
        } catch (\Exception $e) {
            Log::warning('Failed to fetch Wikipedia image for crop: '.$query);
        }

        return $imageUrl;
    }

    protected function fetchGeminiDetails($query)
    {
        $apiKey = config('services.gemini.key');
        $geminiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";

        $prompt = "أنت خبير زراعي دقيق. أريد استخراج الدليل الزراعي لنبات أو محصول يسمى '{$query}'.
يجب أن ترجع النتيجة كـ JSON Object حصراً باللغة العربية وبدون أي نص إضافي أو علامات Markdown.
الحقول المطلوبة بالضبط في نموذج الـ JSON:
{
  \"name\": \"اسم النبتة المختصر\",
  \"scientific_name\": \"الاسم العلمي باللاتينية\",
  \"description\": \"وصف النبتة وفوائدها الأساسية في 3 أسطر\",
  \"planting_season\": \"موسم الزراعة والوقت المفضل للزراعة\",
  \"water_needs\": \"كميات الري الدقيقة بالمعدل\",
  \"fertilizer_needs\": \"نوع السماد المطلوب\",
  \"harvest_time\": \"وقت الحصاد بالأسابيع أو الأشهر\"
}";

        try {
            $response = Http::timeout(20)->post($geminiUrl, [
                'contents' => [['parts' => [['text' => $prompt]]]],
                'generationConfig' => ['responseMimeType' => 'application/json'],
            ]);

            if ($response->successful()) {
                $content = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if ($content) {
                    $decoded = json_decode(trim($content), true);

                    return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
                }
            }
        } catch (\Exception $e) {
            Log::error('Error calling Gemini: '.$e->getMessage());
        }

        return null;
    }
}
