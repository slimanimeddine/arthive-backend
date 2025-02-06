<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ReviewArtistVerificationRequestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|in:approved,rejected',
            'reason' => 'required_if:status,rejected',
        ];
    }

    public function bodyParameters()
    {
        return [
            'status' => [
                'description' => 'The status of the artist verification request',
                'example' => 'approved',
            ],
            'reason' => [
                'description' => 'The reason for rejecting the artist verification request',
                'example' => 'The submitted artworks are not original',
            ],
        ];
    }
}
