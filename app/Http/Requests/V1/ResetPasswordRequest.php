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
            'token' => ['required'],
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'token' => [
                'description' => 'The token sent to the user email.',
            ],
            'email' => [
                'description' => 'The email of the user.',
                'example' => 'johndoe@gmail.com',
            ],
            'password' => [
                'description' => 'The new password of the user.',
                'example' => 'password1234',
            ],
            'password_confirmation' => [
                'description' => 'The new password confirmation.',
                'example' => 'password1234',
            ],
        ];
    }
}
