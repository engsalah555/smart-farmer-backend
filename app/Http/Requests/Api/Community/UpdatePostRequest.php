<?php

namespace App\Http\Requests\Api\Community;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240',
        ];
    }
}
