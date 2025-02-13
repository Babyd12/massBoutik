<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'quantity' => 'required',
			'operation' => 'required|string|in:storage,clearance',
			'price' => 'required',
			'product_id' => 'required',
            'new_price' => 'nullable|integer',
            'operation_type' => 'required|string|in:bulk,in_detail',
        ];
    }
}
