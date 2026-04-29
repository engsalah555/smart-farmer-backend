<?php

namespace App\Modules\Iot\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IotDeviceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IotDeviceRequestController extends Controller
{
    /**
     * Store a newly created IoT device request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'notes' => 'nullable|string|max:1000',
        ]);

        // Check if user already has a pending request
        $existingRequest = IotDeviceRequest::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if ($existingRequest) {
            return response()->json([
                'message' => 'لديك طلب قيد الانتظار مسبقاً.',
            ], 400);
        }

        $deviceRequest = IotDeviceRequest::create([
            'user_id' => Auth::id(),
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'تم إرسال طلبك بنجاح. سيقوم المسؤول بمراجعته قريباً.',
            'request' => $deviceRequest,
        ], 201);
    }

    /**
     * Get the authenticated user's IoT device requests.
     */
    public function index()
    {
        $requests = IotDeviceRequest::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'requests' => $requests,
        ]);
    }
}
