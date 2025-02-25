<?php

namespace App\Filters\Users;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class VerifiedFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === true) {
            $query->whereNotNull('artist_verified_at');
        } elseif (filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === false) {
            $query->whereNull('artist_verified_at');
        }
    }
}
