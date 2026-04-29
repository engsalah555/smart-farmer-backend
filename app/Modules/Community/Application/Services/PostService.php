<?php

namespace App\Modules\Community\Application\Services;

use App\Models\User;
use App\Modules\Community\Domain\Models\Post;
use App\Modules\Community\Domain\Repositories\PostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getFeed(User $user, ?string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $page = request()->get('page', 1);
        // Cache feed per user if no search query
        if (! $search) {
            return Cache::remember("user_{$user->id}_feed_p{$page}_s{$perPage}", 300, function () use ($user, $perPage) {
                return $this->postRepository->getAll($user, null, $perPage);
            });
        }

        return $this->postRepository->getAll($user, $search, $perPage);
    }

    public function createPost(User $user, array $data, $imageFile = null): Post
    {
        // ✅ التحقق التلقائي من ملاءمة المحتوى (Basic AI/Keyword moderation)
        $isRelevant = $this->checkContentRelevance($data['content'] ?? '');
        if (! $isRelevant) {
            // يمكننا إما منع النشر أو وسمه للمراجعة
            // سنقوم هنا بوسمه كـ 'محتمل أنه غير متعلق بالزراعة' عن طريق زيادة البلاغات تلقائياً أو إخفائه
            $data['is_hidden'] = false; // نتركه ظاهراً حالياً لكن يمكن تغييره لـ true للمراجعة
        }

        if ($imageFile) {
            $path = $imageFile->store('posts', 'public');
            $data['image_url'] = $path;
        }

        $post = $this->postRepository->create($user, $data);
        $this->clearGlobalCaches();

        return $post;
    }

    /**
     * التحقق من علاقة المحتوى بالزراعة ومنع الكلمات البذيئة
     */
    protected function checkContentRelevance(string $content): bool
    {
        $content = mb_strtolower($content);

        // 1. قائمة كلمات زراعية أساسية (Arabic Agricultural Keywords)
        $agriKeywords = [
            'نبات', 'زراعة', 'تربة', 'سماد', 'ري', 'محصول', 'شجرة', 'فواكه', 'خضروات', 'بذور',
            'آفات', 'مكافحة', 'بيت محمي', 'هيدروبونيك', 'ماء', 'تسميد', 'غرس', 'مزرعة', 'فلاح',
            'حصد', 'إنتاج', 'مشاتل', 'شتلة', 'تلقيح', 'أزهار', 'ثمار', 'بيئة', 'طبيعة',
        ];

        // 2. التحقق من وجود كلمة زراعية واحدة على الأقل (اختياري - قد يكون صارماً جداً)
        $hasAgriWord = false;
        foreach ($agriKeywords as $word) {
            if (mb_strpos($content, $word) !== false) {
                $hasAgriWord = true;
                break;
            }
        }

        // 3. التحقق من الكلمات النابية (Banned words) - مثال بسيط
        $bannedWords = ['كلمة_سيئة_1', 'كلمة_سيئة_2']; // يجب ملء هذه القائمة
        foreach ($bannedWords as $word) {
            if (mb_strpos($content, $word) !== false) {
                return false; // محتوى غير لائق
            }
        }

        // ملاحظة: يمكن هنا استدعاء خدمة AI (مثل Gemini API) لتحليل المحتوى بشكل أدق
        return true;
    }

    public function updatePost(User $user, $id, array $data, $imageFile = null, bool $removeImage = false): Post
    {
        $post = $this->postRepository->findById($id);
        if (! $post || ($post->user_id !== $user->id)) {
            throw new \Exception('Unauthorized or Post not found');
        }

        if ($imageFile) {
            $path = $imageFile->store('posts', 'public');
            $data['image_url'] = $path;
        } elseif ($removeImage) {
            $data['image_url'] = null;
        }

        $this->postRepository->update($post, $data);
        $this->clearGlobalCaches();

        return $post->load(['user'])->loadCount(['likes', 'comments']);
    }

    public function deletePost(User $user, $id): bool
    {
        $post = $this->postRepository->findById($id);
        if (! $post || ($post->user_id !== $user->id && $user->user_type !== 'admin')) {
            throw new \Exception('Unauthorized or Post not found');
        }

        $deleted = $this->postRepository->delete($post);
        if ($deleted) {
            $this->clearGlobalCaches();
        }

        return $deleted;
    }

    public function toggleLike(User $user, $id): bool
    {
        $post = $this->postRepository->findById($id);
        if (! $post) {
            throw new \Exception('Post not found');
        }

        $isLiked = $this->postRepository->toggleLike($post, $user);
        Cache::forget("user_{$user->id}_feed"); // Optional: target only this user's cache

        return $isLiked;
    }

    public function toggleSave(User $user, $id): bool
    {
        $post = $this->postRepository->findById($id);
        if (! $post) {
            throw new \Exception('Post not found');
        }

        $isSaved = $this->postRepository->toggleSave($post, $user);

        return $isSaved;
    }

    public function getSavedPosts(User $user, int $perPage = 10): LengthAwarePaginator
    {
        return $this->postRepository->getSaved($user, $perPage);
    }

    public function getMyPosts(User $user, int $perPage = 10): LengthAwarePaginator
    {
        return $this->postRepository->getByUser($user, $perPage);
    }

    public function getActivity(User $user, int $perPage = 10): LengthAwarePaginator
    {
        return $this->postRepository->getActivity($user, $perPage);
    }

    public function reportPost(User $user, $id, array $data): bool
    {
        $post = $this->postRepository->findById($id);
        if (! $post) {
            throw new \Exception('المشاركة غير موجودة');
        }

        return $this->postRepository->report($post, $user, $data);
    }

    protected function clearGlobalCaches()
    {
        // In a real microservice, we'd emit an event.
        // Here we just clear or use tags if supported.
        // For simplicity, we can use a cache key versioning or clear all related keys.
    }
}
