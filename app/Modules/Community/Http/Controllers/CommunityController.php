<?php

namespace App\Modules\Community\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Community\AddCommentRequest;
use App\Http\Requests\Api\Community\CreatePostRequest;
use App\Http\Requests\Api\Community\ReportPostRequest;
use App\Http\Requests\Api\Community\UpdateCommentRequest;
use App\Http\Requests\Api\Community\UpdatePostRequest;
use App\Http\Resources\Community\CommentResource;
use App\Http\Resources\Community\PostResource;
use App\Modules\Community\Application\Services\CommentService;
use App\Modules\Community\Application\Services\PostService;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    use ApiResponder;

    public function __construct(
        protected PostService $postService,
        protected CommentService $commentService
    ) {}

    public function getPosts(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $posts = $this->postService->getFeed(Auth::user(), $request->query('query'), (int) $perPage);

        return $this->paginated($posts, PostResource::class);
    }

    public function getSavedPosts(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $posts = $this->postService->getSavedPosts(Auth::user(), (int) $perPage);

        return $this->paginated($posts, PostResource::class);
    }

    public function createPost(CreatePostRequest $request)
    {
        $post = $this->postService->createPost(
            Auth::user(),
            $request->only(['title', 'content']),
            $request->file('image')
        );

        $post->refresh()->loadCount(['likes', 'comments'])->load('user');

        return $this->success(new PostResource($post), 'تم نشر المشاركة بنجاح', 201);
    }

    public function toggleLike(Request $request, $id)
    {
        $isLiked = $this->postService->toggleLike(Auth::user(), $id);

        return $this->success(['is_liked' => $isLiked]);
    }

    public function toggleSave(Request $request, $id)
    {
        $isSaved = $this->postService->toggleSave(Auth::user(), $id);

        return $this->success(['is_saved' => $isSaved]);
    }

    public function updatePost(UpdatePostRequest $request, $id)
    {
        $post = $this->postService->updatePost(
            Auth::user(),
            $id,
            $request->only(['title', 'content']),
            $request->file('image'),
            // ✅ مقارنة boolean آمنة بدلاً من $request->remove_image == 'true'
            filter_var($request->remove_image, FILTER_VALIDATE_BOOLEAN)
        );

        return $this->success(new PostResource($post), 'تم تعديل المنشور بنجاح');
    }

    public function deletePost(Request $request, $id)
    {
        $this->postService->deletePost(Auth::user(), $id);

        return $this->success(null, 'تم حذف المنشور بنجاح');
    }

    public function getMyPosts(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $posts = $this->postService->getMyPosts(Auth::user(), (int) $perPage);

        return $this->paginated($posts, PostResource::class);
    }

    public function getActivity(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $posts = $this->postService->getActivity(Auth::user(), (int) $perPage);

        return $this->paginated($posts, PostResource::class);
    }

    public function addComment(AddCommentRequest $request, $id)
    {
        $comment = $this->commentService->addComment(Auth::user(), $id, $request->validated());

        return $this->success(new CommentResource($comment), 'تمت إضافة التعليق بنجاح');
    }

    public function updateComment(UpdateCommentRequest $request, $id)
    {
        $comment = $this->commentService->updateComment(Auth::user(), $id, $request->validated());

        return $this->success(new CommentResource($comment), 'تم تحديث التعليق بنجاح');
    }

    public function getComments(Request $request, $id)
    {
        $perPage = $request->get('per_page', 15);
        $comments = $this->commentService->getComments($id, (int) $perPage);

        return $this->paginated($comments, CommentResource::class);
    }

    public function deleteComment(Request $request, $id)
    {
        $this->commentService->deleteComment(Auth::user(), $id);

        return $this->success(null, 'تم حذف التعليق بنجاح');
    }

    public function reportPost(ReportPostRequest $request, $id)
    {
        $this->postService->reportPost(Auth::user(), $id, $request->validated());

        return $this->success(null, 'تم إرسال البلاغ بنجاح وسيتم مراجعته من قبل الإدارة');
    }
}
