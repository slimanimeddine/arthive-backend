<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
    ];

    /**
     * The artworks that belong to the tag.
     */
    public function artworks(): BelongsToMany
    {
        return $this->belongsToMany(Artwork::class, 'artwork_tags')
            ->withTimestamps();
    }
}
