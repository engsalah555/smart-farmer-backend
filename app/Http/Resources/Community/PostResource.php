<?php

namespace App\Http\Resources\Community;

use App\Modules\Community\Domain\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Post
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'author' => $this->user?->name ?? 'مستخدم غير معروف',
            // ✅ صورة المستخدم - profile_photo_url يُعيد URL كامل بالفعل
            'image' => $this->user?->profile_photo_url,
            'title' => $this->title,
            'content' => $this->content,
            // ✅ صورة المنشور - image_url accessor يُعيد URL كامل
            'post_image' => $this->image_url,
            // ✅ نُعيد كلا الصيغتين: النسبية للـ Frontend والـ ISO للتحويل
            'time' => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at->toISOString(),
            'likes_count' => (int) ($this->likes_count ?? 0),
            'comments_count' => (int) ($this->comments_count ?? 0),
            'is_liked' => (bool) ($this->is_liked ?? false),
            'is_saved' => (bool) ($this->is_saved ?? false),
            'is_verified' => (bool) ($this->user?->is_verified ?? false),
            // ✅ لا نرسل كل التعليقات في الـ feed لتحسين الأداء
            'comments' => $this->relationLoaded('comments') ? $this->comments->take(3)->map(fn ($c) => [
                'id' => $c->id,
                'user' => $c->user?->name,
                'content' => $c->content,
            ]) : [],
        ];
    }
}
