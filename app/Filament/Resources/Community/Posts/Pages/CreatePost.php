<?php

namespace App\Filament\Resources\Community\Posts\Pages;

use App\Filament\Resources\Community\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
