<?php

namespace App\Http\Requests\V1;

use App\Rules\MaxWordCount;
use App\Rules\MinWordCount;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArtworkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255', 'min:5'],
            'description' => ['sometimes', 'string', new MinWordCount, new MaxWordCount],
            'status' => ['sometimes', 'string', 'in:published'],
            'tags' => ['sometimes', 'array', 'min:1', 'max:3'],
            'tags.*' => ['sometimes', 'string', 'unique:tags,name'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'title' => [
                'description' => 'The title of the artwork',
                'example' => 'Artwork Title',
            ],
            'description' => [
                'description' => 'The description of the artwork',
                'example' => 'This is an artwork description',
            ],
            'status' => [
                'description' => 'The status of the artwork',
                'example' => 'published',
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
