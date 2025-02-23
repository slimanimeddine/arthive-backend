<?php

namespace App\Sorts\Artworks;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class TrendingSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $query->withCount(['artworkLikes' => function ($q) {
            $q->where('created_at', '>=', now()->subDays(7));
        }])
            ->orderBy('artwork_likes_count', $descending ? 'desc' : 'asc');
    }
}
