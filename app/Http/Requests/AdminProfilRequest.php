<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfilRequest extends FormRequest
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
            'full_name' =>'required|string|max:255',
            'nick_name' => 'nullable|string',
            'email' =>'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            'description' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ];
    }
}
