<?php

namespace App\Http\Requests\V1;

use App\Rules\MaxWordCount;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'country' => ['string', 'max:255'],
            'bio' => ['string', new MaxWordCount],
        ];
    }

    public function bodyParameters()
    {
        return [
            'username' => [
                'description' => 'The username of the user',
                'example' => 'johndoe',
            ],
            'first_name' => [
                'description' => 'The first name of the user',
                'example' => 'John',
            ],
            'last_name' => [
                'description' => 'The last name of the user',
                'example' => 'Doe',
            ],
            'email' => [
                'description' => 'The email of the user',
                'example' => 'johndoe@gmail.com',
            ],
            'country' => [
                'description' => 'The country of the user',
                'example' => 'United States',
            ],
            'bio' => [
                'description' => 'The bio of the user',
                'example' => 'This is a bio',
            ],
        ];
    }
}
