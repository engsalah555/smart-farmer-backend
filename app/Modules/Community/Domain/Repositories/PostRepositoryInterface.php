<?php

namespace App\Modules\Community\Domain\Repositories;

use App\Models\User;
use App\Modules\Community\Domain\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface
{
    public function getAll(User $user, ?string $search = null, int $perPage = 10): LengthAwarePaginator;
    public function getSaved(User $user, int $perPage = 10): LengthAwarePaginator;
    public function getByUser(User $user, int $perPage = 10): LengthAwarePaginator;
    public function findById($id): ?Post;
    public function create(User $user, array $data): Post;
    public function update(Post $post, array $data): bool;
    public function delete(Post $post): bool;
    public function toggleLike(Post $post, User $user): bool;
    public function toggleSave(Post $post, User $user): bool;
    public function getActivity(User $user, int $perPage = 10): LengthAwarePaginator;
    public function report(Post $post, User $user, array $data): bool;
}
