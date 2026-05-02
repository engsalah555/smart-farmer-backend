<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VerificationRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponder;

class VerificationController extends Controller
{
    use ApiResponder;

    /**
     * Submit a new verification request.
     */
    public function store(Request $request)
    {
        Log::info('Verification submission started', ['user_id' => $request->user()?->id]);
        
        $request->validate([
            'document_type' => 'required|string',
            'document_image' => 'required|image|max:5120', // 5MB max
        ]);

        $user = $request->user();

        // Check if there is already a pending request
        $existingRequest = VerificationRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        if ($existingRequest) {
            return $this->error('لديك طلب توثيق قيد المراجعة بالفعل.', 422);
        }

        if ($request->hasFile('document_image')) {
            $path = $request->file('document_image')->store('verification_documents', 'public');
            
            VerificationRequest::create([
                'user_id' => $user->id,
                'document_type' => $request->document_type,
                'document_path' => '/storage/' . $path,
                'status' => 'pending',
            ]);

            return $this->success(null, 'تم رفع طلب التوثيق بنجاح. سيتم مراجعته من قبل الإدارة.');
        }

        return $this->error('فشل في رفع الصورة.', 400);
    }

    /**
     * Get the latest verification request status for the user.
     */
    public function status(Request $request)
    {
        $verificationRequest = VerificationRequest::where('user_id', $request->user()->id)
            ->latest()
            ->first();

        return $this->success($verificationRequest);
    }
}
