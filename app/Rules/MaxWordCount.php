<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxWordCount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $wordCount = str_word_count($value);

        if ($wordCount > 200) {
            $fail("The :attribute may not exceed 200 words. It currently has {$wordCount} words.");
        }
    }
}
