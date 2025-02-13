<?php

namespace App\Http\Requests\V1;

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
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string', new MinWordCount, new MaxWordCount],
            'tags' => ['required', 'array', 'min:1', 'max:3'],
            'tags.*' => ['required', 'string', 'distinct:strict', 'exists:tags,name'],
            'photos' => ['required', 'array', 'min:1', 'max:10', 'required_array_keys:file,is_main'],
            'photos.*.file' => ['required', 'image', 'max:2048'],
            'photos.*.is_main' => ['required', 'boolean'],
            'photos' => function ($attribute, $value, $fail) {
                $trueCount = collect($value)->where('is_main', true)->count();
                if ($trueCount !== 1) {
                    $fail('The photos array must contain exactly one main photo.');
                }
            },
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
        ];
    }
}
