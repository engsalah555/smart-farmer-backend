<?php

namespace App\Http\Requests\Marketplace;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Any authenticated user can place an order
    }

    public function rules()
    {
        return [
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric',
            'shipping_address' => 'nullable|string',
            'payment_method' => 'required|in:cash,bank_transfer,credit_card',
            'receipt_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096|required_if:payment_method,bank_transfer',
            'notes' => 'nullable|string',
        ];
    }
}
