<?php

namespace App\Modules\Community\Infrastructure\Repositories;

use App\Models\User;
use App\Modules\Community\Domain\Models\Post;
use App\Modules\Community\Domain\Models\SavedPost;
use App\Modules\Community\Domain\Repositories\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function getAll(User $user, ?string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $userId = $user->id;
        $query = Post::with(['user:id,name,profile_image,is_verified'])
            ->withCount('comments')
            ->where('is_hidden', false)
            ->withExists(['likes as is_liked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['savedBy as is_saved' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }]);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        return $query->latest()->paginate($perPage);
    }

    public function getSaved(User $user, int $perPage = 10): LengthAwarePaginator
    {
        $userId = $user->id;
        $savedPostIds = SavedPost::where('user_id', $userId)->pluck('post_id');

        return Post::with(['user:id,name,profile_image,is_verified'])
            ->withCount('comments')
            ->where('is_hidden', false) // ✅ Exclude hidden posts
            ->withExists(['likes as is_liked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['savedBy as is_saved' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->whereIn('id', $savedPostIds)
            ->latest()
            ->paginate($perPage);
    }

    public function getByUser(User $user, int $perPage = 10): LengthAwarePaginator
    {
        $userId = $user->id;
        return Post::with(['user:id,name,profile_image,is_verified'])
            ->withCount('comments')
            ->withExists(['likes as is_liked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['savedBy as is_saved' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->where('user_id', $userId)
            ->latest()
            ->paginate($perPage);
    }

    public function findById($id): ?Post
    {
        return Post::find($id);
    }

    public function create(User $user, array $data): Post
    {
        return $user->posts()->create($data);
    }

    public function update(Post $post, array $data): bool
    {
        return $post->update($data);
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }

    public function toggleLike(Post $post, User $user): bool
    {
        $userId = $user->id;
        $like = $post->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            $post->decrement('likes_count');
            return false;
        } else {
            $post->likes()->create(['user_id' => $userId]);
            $post->increment('likes_count');
            return true;
        }
    }

    public function toggleSave(Post $post, User $user): bool
    {
        $userId = $user->id;
        $saved = $post->savedBy()->where('user_id', $userId)->first();

        if ($saved) {
            $saved->delete();
            return false;
        } else {
            $post->savedBy()->create(['user_id' => $userId]);
            return true;
        }
    }

    public function getActivity(User $user, int $perPage = 10): LengthAwarePaginator
    {
        $userId = $user->id;
        return Post::with(['user:id,name,profile_image,is_verified'])
            ->withCount('comments')
            ->where('is_hidden', false) // ✅ Exclude hidden posts
            ->withExists(['likes as is_liked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['savedBy as is_saved' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->where(function ($query) use ($userId) {
                $query->whereHas('likes', function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                })
                ->orWhereHas('comments', function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                });
            })
            ->latest()
            ->paginate($perPage);
    }

    public function report(Post $post, User $user, array $data): bool
    {
        $report = $post->reports()->create([
            'user_id' => $user->id,
            'reason' => $data['reason'],
            'details' => $data['details'] ?? null,
        ]);

        if ($report) {
            $post->increment('reports_count');
            
            // Auto-hide if reports reach a certain threshold (e.g., 5)
            if ($post->reports_count >= 5) {
                $post->update(['is_hidden' => true]);
            }
            
            return true;
        }

        return false;
    }
}
