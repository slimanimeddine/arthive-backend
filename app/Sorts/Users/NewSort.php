<?php

namespace App\Sorts\Users;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class NewSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $query->orderBy('created_at', $descending ? 'desc' : 'asc');
    }
}
