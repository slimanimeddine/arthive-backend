<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UploadArtworkPhotosRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photos' => ['required', 'array', 'min:1', 'max:10'],
            'photos.*' => ['required', 'image', 'max:5000000'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'photos' => [
                'description' => 'The photos of the artwork',
            ],
            'photos.*' => [
                'description' => 'A photo of the artwork'
            ]
        ];
    }
}
