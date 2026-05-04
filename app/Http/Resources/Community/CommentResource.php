<?php

namespace App\Http\Resources\Community;

use App\Modules\Community\Domain\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Comment
 */
class CommentResource extends JsonResource
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
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'userName' => $this->user?->name ?? 'مستخدم غير معروف',
            'userAvatar' => $this->user?->profile_photo_url,
            'content' => $this->content,
            'time' => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at,
            'is_verified' => (bool) ($this->user?->is_verified ?? false),
        ];
    }
}
