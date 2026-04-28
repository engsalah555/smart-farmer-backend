<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Models\Contracts\HasTenants;
use Filament\Models\Contracts\HasDefaultTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\PlantGuide\Domain\Models\Crop;
use App\Modules\Iot\Domain\Models\IotDevice;
use App\Modules\Community\Domain\Models\Post;
use App\Modules\Community\Domain\Models\Comment;
use App\Modules\Community\Domain\Models\Like;
use App\Modules\Community\Domain\Models\SavedPost;

class User extends Authenticatable implements FilamentUser, HasTenants, HasDefaultTenant
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'phone',
        'profile_image',
        'profile_photo_path',
        'is_verified',
        'custom_title',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean',
        ];
    }

    /**
     * Relationships
     */
    public function store(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Store::class);
    }

    public function crops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Crop::class);
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function savedPosts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SavedPost::class);
    }

    /**
     * Determine if the user is a seller (owns a store).
     */
    public function isSeller(): bool
    {
        return $this->store()->exists() || $this->user_type === 'admin';
    }

    public function getIsSellerAttribute(): bool
    {
        return $this->isSeller();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Debugging log (can be removed later)
        // \Illuminate\Support\Facades\Log::info('canAccessPanel called', ['user_id' => $this->id, 'user_type' => $this->user_type, 'panel_id' => $panel->getId()]);

        if ($this->user_type === 'admin') {
            return true;
        }

        if ($panel->getId() === 'seller') {
            return $this->user_type === 'seller' && $this->store()->exists();
        }

        if ($panel->getId() === 'admin') {
            return $this->user_type === 'admin';
        }

        return false;
    }

    /**
     * Get the tenants that the user can access.
     */
    public function getTenants(Panel $panel): array|Collection
    {
        return $this->store ? collect([$this->store]) : collect();
    }

    /**
     * Check if the user can access a specific tenant.
     */
    public function canAccessTenant(Model $tenant): bool
    {
        return $this->store && $this->store->id === $tenant->id;
    }

    /**
     * Get the default tenant for the user.
     */
    public function getDefaultTenant(Panel $panel): ?Model
    {
        return $this->store;
    }

    /**
     * Get the Filament avatar URL.
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->getProfilePhotoUrlAttribute();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string|null
     */
    public function getProfilePhotoUrlAttribute(): ?string
    {
        if (!$this->profile_image) {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
        }

        // If it's already a full URL, return it
        if (filter_var($this->profile_image, FILTER_VALIDATE_URL)) {
            return $this->profile_image;
        }

        // Clean the path (remove leading slashes)
        $path = ltrim($this->profile_image, '/');

        // If it already starts with 'storage/', don't prepend it again
        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }
}
