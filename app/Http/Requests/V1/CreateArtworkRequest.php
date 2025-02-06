<?php

namespace App\Http\Requests\V1;

use App\Rules\ExactlyOneMainArtworkPhotoExists;
use App\Rules\MaxWordCount;
use App\Rules\MinWordCount;
use Illuminate\Foundation\Http\FormRequest;

class CreateArtworkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photos' => ['required', 'array', 'min:1', 'max:10', new ExactlyOneMainArtworkPhotoExists],
            'photos.*.file' => ['required', 'image', 'max:2048'],
            'photos.*.is_main' => ['required', 'boolean'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', new MinWordCount, new MaxWordCount],
            'tags' => ['required', 'array', 'min:1', 'max:3'],
            'tags.*' => ['required', 'string', 'unique:tags,name'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'photos' => [
                'description' => 'The photos of the artwork',
            ],
            'photos.*.file' => [
                'description' => 'The file of the photo',
            ],
            'photos.*.is_main' => [
                'description' => 'Set a photo as main or not',
                'example' => 'true',
            ],
            'title' => [
                'description' => 'The title of the artwork',
                'example' => 'Artwork Title',
            ],
            'description' => [
                'description' => 'The description of the artwork',
                'example' => 'This is an artwork description',
            ],
            'tags' => [
                'description' => 'The tags of the artwork',
                'example' => 'abstract, painting',
            ],
            'tags.*' => [
                'description' => 'The tag of the artwork',
                'example' => 'abstract',
            ],
        ];
    }
}
