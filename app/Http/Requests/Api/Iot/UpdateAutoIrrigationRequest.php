<?php

namespace App\Http\Requests\Api\Iot;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAutoIrrigationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'auto_irrigation' => 'required|boolean',
            'auto_threshold' => 'sometimes|integer|min:0|max:100',
        ];
    }
}
