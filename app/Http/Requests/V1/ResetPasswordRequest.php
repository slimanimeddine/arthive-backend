<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => ['required', 'string'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'The email address of the user requesting the password reset.',
                'example' => 'johndoe@gmail.com',
            ],
            'new_password' => [
                'description' => 'The new password for the user.',
                'example' => 'newpassword123',
            ],
            'new_password_confirmation' => [
                'description' => 'The confirmation of the new password.',
                'example' => 'newpassword123',
            ],
            'token' => [
                'description' => 'The password reset token.',
                'example' => '1234567890abcdef',
            ],
        ];
    }
}
