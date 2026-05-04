<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Register a new user or seller.
     */
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'] ?? 'user',
            'phone' => $data['phone'] ?? null,
            'is_verified' => true, // Auto-verify for now
        ]);

        if (isset($data['store_type']) || ($data['user_type'] ?? '') === 'seller') {
            $user->store()->create([
                'store_name' => $data['store_name'] ?? ($user->name.' Store'),
                'store_type' => $data['store_type'] ?? 'منتجات زراعية',
            ]);
        }

        return $user;
    }

    /**
     * Authenticate a user and generate a token.
     */
    public function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['البريد الإلكتروني أو كلمة المرور غير صحيحة'],
            ]);
        }

        // ✅ التحقق من نوع الحساب عند تسجيل الدخول
        if (isset($data['user_type'])) {
            if ($data['user_type'] === 'seller' && ! $user->isSeller()) {
                throw ValidationException::withMessages([
                    'email' => ['هذا الحساب غير مسجل كبائع. يرجى تسجيل الدخول كمشتري.'],
                ]);
            }
        }

        return $user;
    }

    /**
     * Update user profile.
     */
    public function updateProfile($user, array $data, $profileImage = null)
    {
        $updateData = collect($data)->only(['name', 'phone', 'custom_title'])->toArray();

        if (isset($data['new_password'])) {
            if (! Hash::check($data['current_password'], $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => ['كلمة المرور الحالية غير صحيحة'],
                ]);
            }
            $updateData['password'] = Hash::make($data['new_password']);
        }

        if ($profileImage) {
            if ($user->profile_image) {
                $oldPath = str_replace('/storage/', '', $user->profile_image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $profileImage->store('avatars', 'public');
            $updateData['profile_image'] = '/storage/'.$path;
        }

        $user->update($updateData);

        return $user->fresh();
    }
}
