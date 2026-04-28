<?php

namespace App\Filament\Resources\Community\Posts;

use App\Filament\Resources\Community\Posts\Pages\CreatePost;
use App\Filament\Resources\Community\Posts\Pages\EditPost;
use App\Filament\Resources\Community\Posts\Pages\ListPosts;
use App\Filament\Resources\Community\Posts\Schemas\PostForm;
use App\Filament\Resources\Community\Posts\Tables\PostsTable;
use App\Modules\Community\Domain\Models\Post;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'المنتدى الزراعي';
    }

    public static function getNavigationLabel(): string
    {
        return 'المنشورات';
    }

    public static function getModelLabel(): string
    {
        return 'منشور';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المنشورات';
    }

    public static function form(Schema $schema): Schema
    {
        return PostForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
