<?php

namespace App\Modules\Ai\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlantDiseaseController extends Controller
{
    use ApiResponder;

    public function analyze(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        try {
            $imageData = file_get_contents($request->file('image')->path());
            $apiKey    = config('services.huggingface.key');
            $apiUrl    = 'https://api-inference.huggingface.co/models/prof-freakenstein/plantnet-disease-detection';

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type'  => 'application/octet-stream',
            ])
            ->timeout(30)
            ->send('POST', $apiUrl, ['body' => $imageData]);

            if ($response->successful()) {
                $predictions = $response->json();

                if (!empty($predictions) && isset($predictions[0])) {
                    $topPrediction = $predictions[0];
                    return $this->success([
                        'disease'         => $topPrediction['label'],
                        'confidence'      => $topPrediction['score'],
                        'all_predictions' => array_slice($predictions, 0, 3),
                    ]);
                }

                return $this->error('لم يتمكن النموذج من تحديد المرض، يرجى تجربة صورة أوضح', 422);
            }

            // ✅ نسجِّل الخطأ الداخلي ولا نُظهره للمستخدم
            Log::error('Hugging Face API Error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return $this->error('خدمة التحليل غير متاحة حالياً، يرجى المحاولة لاحقاً', 503);

        } catch (\Exception $e) {
            Log::error('Plant Disease Detection Error', ['error' => $e->getMessage()]);
            return $this->error('حدث خطأ أثناء معالجة الصورة', 500);
        }
    }
}
