<?php

namespace App\Http\Requests\Api\Community;

use Illuminate\Foundation\Http\FormRequest;

class ReportPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reason' => 'required|string|in:inappropriate,irrelevant,spam,harassment,other',
            'details' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'reason.required' => 'يرجى اختيار سبب الإبلاغ',
            'reason.in' => 'سبب الإبلاغ المختار غير صالح',
        ];
    }
}
