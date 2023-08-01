<?php

namespace App\Http\Requests;

use App\Rules\VerifyPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => ['required', new VerifyPasswordRule($this->post('email'))],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute is required',
            'email.email' => 'Invalid email format',
            'email.exists' => 'Email not found',
        ];
    }
}
