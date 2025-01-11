<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    /**
     * Get the user that created the artwork.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the photos of the artwork.
     */
    public function artworkPhotos(): HasMany
    {
        return $this->hasMany(ArtworkPhoto::class);
    }

    /**
     * Get the comments for the artwork.
     */
    public function comments()
    {
        return $this->hasMany(ArtworkComment::class);
    }

    /**
     * Get the likes for the artwork.
     */
    public function likes()
    {
        return $this->hasMany(ArtworkLike::class);
    }

    /**
     * Get the tags for the artwork.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'artwork_tags');
    }
}
