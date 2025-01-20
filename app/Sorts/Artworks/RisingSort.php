<?php

namespace App\Sorts\Artworks;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class RisingSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $query->withCount(['likes' => function ($q) {
            $q->where('created_at', '>=', now()->subDay());
        }])
            ->orderBy('likes_count', $descending ? 'desc' : 'asc');
    }
}
