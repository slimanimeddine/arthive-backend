<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ReplaceArtworkPhotoPathRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => ['required', 'image', 'max:5000000'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'photo' => [
                'description' => 'The file of the photo',
            ],
        ];
    }
}
