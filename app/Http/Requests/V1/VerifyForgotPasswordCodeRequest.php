<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class VerifyForgotPasswordCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'code' => ['required', 'string', 'size:6'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'The email address of the user requesting password reset',
                'example' => 'johndoe@gmail.com',
            ],
            'code' => [
                'description' => 'The verification code sent to the user\'s email',
                'example' => '123456',
            ],
        ];
    }
}
