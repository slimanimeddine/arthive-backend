<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'username' => [
                'description' => 'A unique username for the user.',
                'example' => 'johndoe',
            ],
            'email' => [
                'description' => 'The email address of the user. Must be unique.',
                'example' => 'johndoe@gmail.com',
            ],
            'password' => [
                'description' => 'A secure password for the user. Must be at least 8 characters long.',
                'example' => 'password',
            ],
            'password_confirmation' => [
                'description' => 'The confirmed password.',
                'example' => 'password',
            ],
        ];
    }
}
