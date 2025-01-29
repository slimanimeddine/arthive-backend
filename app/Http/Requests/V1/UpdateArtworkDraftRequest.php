<?php

namespace App\Http\Requests\V1;

use App\Rules\MaxWordCount;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArtworkDraftRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', new MaxWordCount],
            'tags' => ['required', 'array', 'min:1', 'max:3'],
            'tags.*' => ['required', 'string', 'unique:tags,name'],
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
