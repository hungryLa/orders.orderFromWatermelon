<?php

namespace App\Http\Requests\Furniture;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'description' => 'required|string',
            'measurements' => 'boolean',
            'visualization' => 'boolean',
            'getting_started' => 'boolean',
            'cutting_order' => 'boolean',
            'assembling' => 'boolean',
            'delivery_installation' => 'boolean',
            'note' => 'nullable|string',
        ];
    }
}
