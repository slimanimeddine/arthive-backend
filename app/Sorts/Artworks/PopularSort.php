<?php

namespace App\Sorts\Artworks;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class PopularSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $query->withCount('artworkLikes')
            ->orderBy('artwork_likes_count', $descending ? 'desc' : 'asc');
    }
}
