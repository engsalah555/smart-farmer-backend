<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IotDevice;
use App\Models\Post;
use App\Models\PostReport;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    use ApiResponder;

    // ✅ لا حاجة لـ middleware في Constructor — المسارات محمية بـ 'can:admin' Gate في routes/api.php

    /**
     * GET /admin/stats
     */
    public function getStats(): JsonResponse
    {
        return $this->success([
            'users' => User::count(),
            'stores' => Store::count(),
            'products' => Product::count(),
            'posts' => Post::count(),
        ]);
    }

    /**
     * GET /admin/users
     * per_page محدودة بـ 100 لمنع استرجاع كل السجلات دفعة واحدة
     */
    public function getUsers(Request $request): JsonResponse
    {
        // ✅ تقييد per_page — يمنع per_page=999999
        $perPage = min((int) $request->input('per_page', 20), 100);

        $users = User::with('store')
            ->select(['id', 'name', 'email', 'user_type', 'phone', 'profile_image', 'is_verified', 'created_at'])
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $users->items(),
            'meta' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'per_page' => $users->perPage(),
                'total' => $users->total(),
            ],
        ]);
    }

    /**
     * PUT /admin/users/{id}/role
     */
    public function updateUserRole(Request $request, $id): JsonResponse
    {
        $request->validate([
            'user_type' => 'required|in:admin,seller,user',
        ]);

        $user = User::findOrFail($id);
        $user->user_type = $request->user_type;
        $user->save();

        Log::info('Admin updated user role', [
            'admin_id' => auth()->id(),
            'target_user' => $id,
            'new_role' => $request->user_type,
        ]);

        return $this->success(
            $user->only(['id', 'name', 'email', 'user_type']),
            'تم تحديث دور المستخدم بنجاح'
        );
    }

    /**
     * POST /admin/users/{id}/toggle-verification
     * تفعيل/إلغاء علامة التوثيق يدوياً من قبل الأدمن
     */
    public function toggleVerification($id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->is_verified = ! $user->is_verified;
        $user->save();

        Log::info('Admin toggled user verification', [
            'admin_id' => auth()->id(),
            'target_user' => $id,
            'is_verified' => $user->is_verified,
        ]);

        return $this->success(
            $user,
            $user->is_verified ? 'تم توثيق الحساب بنجاح' : 'تم إلغاء توثيق الحساب'
        );
    }

    /**
     * DELETE /admin/users/{id}
     */
    public function deleteUser($id): JsonResponse
    {
        // ✅ منع حذف المدير لنفسه
        if (auth()->id() == $id) {
            return $this->error('لا يمكنك حذف حسابك الخاص', 400);
        }

        $user = User::findOrFail($id);
        $user->delete();

        Log::warning('Admin deleted user', [
            'admin_id' => auth()->id(),
            'deleted_user' => $id,
        ]);

        return $this->success(null, 'تم حذف المستخدم بنجاح');
    }

    /**
     * GET /admin/reports
     * جلب البلاغات المعلقة
     */
    public function getReports(Request $request): JsonResponse
    {
        $perPage = min((int) $request->input('per_page', 20), 100);

        $reports = PostReport::with(['user:id,name', 'post:id,title,content,user_id'])
            ->where('status', 'pending')
            ->latest()
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $reports->items(),
            'meta' => [
                'current_page' => $reports->currentPage(),
                'last_page' => $reports->lastPage(),
                'per_page' => $reports->perPage(),
                'total' => $reports->total(),
            ],
        ]);
    }

    /**
     * POST /admin/reports/{id}/action
     * اتخاذ إجراء بشأن بلاغ (حذف، تجاهل، حظر)
     */
    public function actionReport(Request $request, $id): JsonResponse
    {
        $request->validate([
            'action' => 'required|in:delete_post,dismiss,hide_post',
        ]);

        $report = PostReport::findOrFail($id);
        $post = Post::findOrFail($report->post_id);

        $message = '';
        switch ($request->action) {
            case 'delete_post':
                $post->delete();
                $report->status = 'action_taken';
                $message = 'تم حذف المنشور بنجاح';
                break;
            case 'hide_post':
                $post->is_hidden = true;
                $post->save();
                $report->status = 'action_taken';
                $message = 'تم إخفاء المنشور بنجاح';
                break;
            case 'dismiss':
                $report->status = 'reviewed';
                $message = 'تم تجاهل البلاغ';
                break;
        }

        $report->save();

        return $this->success(null, $message);
    }

    /**
     * GET /admin/iot-requests
     * جلب طلبات أجهزة IoT المعلقة
     */
    public function getIotRequests(Request $request): JsonResponse
    {
        $perPage = min((int) $request->input('per_page', 20), 100);

        $requests = IotDevice::with('user:id,name,email')
            ->where('status', 'pending')
            ->latest()
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $requests->items(),
            'meta' => [
                'current_page' => $requests->currentPage(),
                'last_page' => $requests->lastPage(),
                'per_page' => $requests->perPage(),
                'total' => $requests->total(),
            ],
        ]);
    }

    /**
     * POST /admin/iot-requests/{id}/approve
     * قبول طلب الـ IoT وتعيين رقم الوحدة (Device ID)
     */
    public function approveIotRequest(Request $request, $id): JsonResponse
    {
        $request->validate([
            'device_id' => 'required|string|unique:iot_devices,device_id,'.$id,
            'name' => 'nullable|string|max:255',
        ]);

        $device = IotDevice::findOrFail($id);

        $device->update([
            'device_id' => $request->device_id,
            'name' => $request->name ?? 'نظام الري الذكي',
            'status' => 'active',
        ]);

        // إشعار المستخدم (اختياري - يمكن توسيعه)
        // \App\Models\Notification::create([...]);

        Log::info('Admin approved IoT request', [
            'admin_id' => auth()->id(),
            'device_id' => $device->id,
            'unit_id' => $request->device_id,
        ]);

        return $this->success($device, 'تم تفعيل وحدة IoT للحساب بنجاح');
    }

    /**
     * DELETE /admin/iot-requests/{id}
     * رفض طلب الـ IoT
     */
    public function rejectIotRequest($id): JsonResponse
    {
        $device = IotDevice::findOrFail($id);
        $device->delete();

        Log::warning('Admin rejected/deleted IoT request', [
            'admin_id' => auth()->id(),
            'target_id' => $id,
        ]);

        return $this->success(null, 'تم رفض وحذف طلب الـ IoT');
    }
}
