<?php

namespace App\Modules\Community\Application\Services;

use App\Models\User;
use App\Modules\Community\Domain\Models\Comment;
use App\Modules\Community\Domain\Models\Post;

class CommentService
{
    /**
     * Add a comment to a post.
     */
    public function addComment(User $user, int $postId, array $data): Comment
    {
        $post = Post::findOrFail($postId);

        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'content' => $data['content'],
        ]);

        $post->increment('comments_count');

        return $comment->load('user');
    }

    /**
     * Update a comment.
     */
    public function updateComment(User $user, int $commentId, array $data): Comment
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== $user->id) {
            throw new \Exception('غير مصرح لك بتعديل هذا التعليق');
        }

        $comment->update(['content' => $data['content']]);

        return $comment->load('user');
    }

    /**
     * Delete a comment.
     */
    public function deleteComment(User $user, int $commentId): bool
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== $user->id && $user->user_type !== 'admin') {
            throw new \Exception('غير مصرح لك بحذف هذا التعليق');
        }

        $post = Post::findOrFail($comment->post_id);
        $deleted = $comment->delete();

        if ($deleted) {
            $post->decrement('comments_count');
        }

        return $deleted;
    }

    /**
     * Get comments for a post.
     */
    public function getComments(int $postId, int $perPage = 15)
    {
        return Comment::where('post_id', $postId)
            ->with('user')
            ->latest()
            ->paginate($perPage);
    }
}
