<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LendRequest extends FormRequest
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
            'advance' => 'required|numeric',
			'date' => 'nullable|date',
			'payment_status' => 'required|boolean',
			'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'operation_type' => 'required|string|in:bulk,in_detail',
            'quantity' => 'required|integer|min:0',
        ];
    }
}
