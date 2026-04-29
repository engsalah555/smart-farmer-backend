<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // ✅ كلمة مرور مبسطة للتسهيل على المستخدمين
            'password' => 'required|string|min:6',
            'user_type' => 'nullable|string|in:user,seller,admin',
            'store_name' => 'nullable|string|max:255',
            'store_type' => 'nullable|string|max:100',
            // ✅ السماح بالأرقام والمسافات والرموز الأساسية
            'phone' => 'nullable|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'store_type.required_if' => 'نوع المتجر مطلوب للحسابات التجارية',
        ];
    }
}
