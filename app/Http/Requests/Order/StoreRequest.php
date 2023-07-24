<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|integer',
            'title' => 'required|string',
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'price' => 'required|integer',
            'delivery_price' => 'nullable|integer',
            'deposit' => 'nullable|integer',
            'rest_amount' => 'nullable|integer',
            'color' => 'nullable|string',
            'contract' => 'boolean',
        ];
    }
}
