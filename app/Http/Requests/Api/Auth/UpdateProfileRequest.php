<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string',
            'current_password' => 'required_with:new_password|string',
            'new_password' => 'nullable|string|min:6',
            'profile_image' => 'nullable|image|max:5120',
        ];
    }
}
