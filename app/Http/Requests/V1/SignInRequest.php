<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'The email address of the user attempting to sign in.',
                'example' => 'johndoe@gmail.com',
            ],
            'password' => [
                'description' => 'The password associated with the user account.',
                'example' => 'password',
            ],
        ];
    }
}
