<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email'    =>'required|email|exists:users,email',
            'password' => 'required|string',
            // 'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Email is required',
            'email.email'        => 'Invalid email format',
            'email.exists'       => 'Email does not exist',
            'password.required' => 'Password is required',
            'password.min'      => 'Password must be at least 8 characters long',
            'password.regex'     => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
        ];
    }
}
