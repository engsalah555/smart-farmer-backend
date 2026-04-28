<?php

namespace App\Http\Requests\Marketplace;

use Illuminate\Foundation\Http\FormRequest;

/**
 * CatalogRequest — التحقق من بيانات الكتالوج (إنشاء وتحديث)
 *
 * Authorization: البائع فقط
 * يدعم كلاً من: POST (إنشاء) و POST مع _method=PUT (تحديث)
 */
class CatalogRequest extends FormRequest
{
    public function authorize(): bool
    {
        // البائع فقط يملك متاجر وكتالوجات
        return $this->user()?->user_type === 'seller';
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'name'        => $isUpdate
                ? 'sometimes|required|string|max:100'
                : 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'اسم الكتالوج مطلوب',
            'name.max'         => 'اسم الكتالوج يجب ألا يتجاوز 100 حرف',
            'image.image'      => 'يجب أن يكون الملف صورة',
            'image.max'        => 'حجم الصورة لا يتجاوز 2 ميجابايت',
            'sort_order.integer' => 'الترتيب يجب أن يكون رقماً صحيحاً',
        ];
    }
}
