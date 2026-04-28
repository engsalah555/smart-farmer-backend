<?php

namespace App\Http\Requests\Api\Iot;

use Illuminate\Foundation\Http\FormRequest;

class AddScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'start_time' => 'required',
            'days' => 'required|array',
        ];
    }
}
