<?php

namespace App\Sorts\Users;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class PopularSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $query->withCount('receivedArtworkLikes')
            ->orderBy('received_artwork_likes_count', $descending ? 'desc' : 'asc');
    }
}
