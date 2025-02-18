<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class SendResetPasswordLinkRequest extends FormRequest
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
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'The email address of the user. Must be unique.',
                'example' => 'johndoe@gmail.com',
            ],
        ];
    }
}
