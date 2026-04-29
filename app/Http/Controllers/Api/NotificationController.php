<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $notifications = DB::table('app_notifications')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $notifications,
            'unread_count' => DB::table('app_notifications')
                ->where('user_id', $userId)
                ->whereNull('read_at')
                ->count(),
        ]);
    }

    public function markAsRead(Request $request, $id)
    {
        DB::table('app_notifications')
            ->where('id', $id)
            ->where('user_id', $request->user()->id)
            ->update(['read_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'تم قراءة الإشعار',
        ]);
    }

    public function markAllAsRead(Request $request)
    {
        DB::table('app_notifications')
            ->where('user_id', $request->user()->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'تم قراءة جميع الإشعارات',
        ]);
    }
}
