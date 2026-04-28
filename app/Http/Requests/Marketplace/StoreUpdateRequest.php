<?php

namespace App\Http\Requests\Marketplace;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->user_type === 'seller';
    }

    public function rules()
    {
        return [
            'store_name'  => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'address'     => 'nullable|string',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'store_name.required' => 'اسم المتجر مطلوب',
            'store_name.max'      => 'اسم المتجر طويل جداً',
            'cover_image.image'   => 'يجب أن تكون صورة الغلاف صورة',
        ];
    }
}
