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
            'title' => ['sometimes', 'string', 'min:3', 'max:255'],
            'description' => ['sometimes', 'string', new MinWordCount, new MaxWordCount],
            'tags' => ['sometimes', 'array', 'min:1', 'max:3'],
            'tags.*' => ['sometimes', 'string', 'distinct:strict', 'exists:tags,name'],
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
