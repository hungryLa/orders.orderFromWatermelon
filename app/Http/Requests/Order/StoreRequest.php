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
            'type_address' => 'required|integer',
            'address' => 'required|string',
            'type_payment' => 'required|integer',
            'price' => 'required|integer',
            'delivery_price' => 'nullable|integer',
            'deposit' => 'nullable|integer',
            'lifting_price' => 'nullable|integer',
            'assembly_price' => 'nullable|integer',
            'rest_amount' => 'nullable|integer',
            'color' => 'nullable|string',
            'contract' => 'boolean',
            'is_shipped' => 'boolean',
        ];
    }
}
