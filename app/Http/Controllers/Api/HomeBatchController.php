<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Community\Application\Services\PostService;
use App\Http\Controllers\Api\IotController;
use App\Http\Resources\Community\PostResource;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IotDevice;

class HomeBatchController extends Controller
{
    use ApiResponder;

    public function __construct(
        protected PostService $postService
    ) {}

    public function getHomeData(Request $request)
    {
        $user = Auth::user();
        $cacheKey = 'home_batch_' . $user->id;

        return cache()->remember($cacheKey, 60, function () use ($user) {
            // 1. Get Latest Posts (Feed)
            $posts = $this->postService->getFeed($user, null, 5);
            
            // 2. Construct Unified Response
            return $this->success([
                'posts' => PostResource::collection($posts),
                // IoT sensor data is now handled separately by IotController for better performance and separation of concerns.
            ]);
        });
    }
}
