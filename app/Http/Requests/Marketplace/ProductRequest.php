<?php

namespace App\Http\Requests\Marketplace;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->user_type === 'seller';
    }

    public function rules()
    {
        $isUpdate = $this->route('id') !== null;

        return [
            'name' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'description' => $isUpdate ? 'sometimes|required|string' : 'required|string',
            'price' => $isUpdate ? 'sometimes|required|numeric|min:0' : 'required|numeric|min:0',
            'unit' => $isUpdate ? 'sometimes|required|string' : 'required|string',
            'stock_quantity' => $isUpdate ? 'sometimes|required|integer|min:0' : 'required|integer|min:0',
            'catalog_id' => 'nullable|exists:store_catalogs,id',
            'category' => $isUpdate ? 'sometimes|nullable|string' : 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'other_images' => 'nullable|array|max:4',
            'other_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
            'paymentMethods' => 'nullable|array',
            'paymentMethods.*' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المنتج مطلوب',
            'description.required' => 'وصف المنتج مطلوب',
            'price.required' => 'سعر المنتج مطلوب',
            'price.numeric' => 'السعر يجب أن يكون رقماً',
            'unit.required' => 'الوحدة مطلوبة (مثل: كيلو، كيس)',
            'stock_quantity.required' => 'الكمية المتوفرة مطلوبة',
            'catalog_id.exists' => 'الكتالوج المحدد غير موجود',
            'image.image' => 'يجب أن يكون الملف صورة',
            'image.max' => 'حجم الصورة لا يجب أن يتجاوز 2 ميجابايت',
        ];
    }
}
