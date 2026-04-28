<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
                'store_name' => $data['store_name'] ?? ($user->name . ' Store'),
                'store_type' => $data['store_type'] ?? 'general',
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

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['البريد الإلكتروني أو كلمة المرور غير صحيحة']
            ]);
        }

        return $user;
    }

    /**
     * Update user profile.
     */
    public function updateProfile($user, array $data, $profileImage = null)
    {
        $updateData = collect($data)->only(['name', 'phone'])->toArray();

        if (isset($data['new_password'])) {
            if (!Hash::check($data['current_password'], $user->password)) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'current_password' => ['كلمة المرور الحالية غير صحيحة']
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
            $updateData['profile_image'] = '/storage/' . $path;
        }

        $user->update($updateData);

        return $user->fresh();
    }
}
