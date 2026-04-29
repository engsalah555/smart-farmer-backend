<?php

use App\Models\User;
use App\Modules\Community\Domain\Models\Post;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$request = Request::capture();
$response = $kernel->handle($request);

$user = User::first();
if ($user) {
    echo 'profile_photo_url: '.$user->profile_photo_url.PHP_EOL;
    echo 'profile_image col: '.$user->profile_image.PHP_EOL;
} else {
    echo 'No users found'.PHP_EOL;
}

$post = Post::first();
if ($post) {
    echo 'post image_url: '.$post->image_url.PHP_EOL;
    echo 'post image col: '.($post->attributes['image'] ?? 'null').PHP_EOL;
} else {
    echo 'No posts found'.PHP_EOL;
}
