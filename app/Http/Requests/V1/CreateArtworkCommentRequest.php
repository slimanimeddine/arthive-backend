<?php

namespace App\Http\Requests\V1;

use App\Rules\MaxWordCount;
use Illuminate\Foundation\Http\FormRequest;

class CreateArtworkCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'comment_text' => ['required', 'string', new MaxWordCount],
        ];
    }

    public function bodyParameters()
    {
        return [
            'comment_text' => [
                'description' => 'The text of the comment',
                'example' => 'This is a comment',
            ],
        ];
    }
}
