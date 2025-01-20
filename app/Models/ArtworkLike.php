<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'user_id',
    ];

    /**
     * Get the artwork that this like belongs to.
     */
    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    /**
     * Get the user who liked the artwork.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
