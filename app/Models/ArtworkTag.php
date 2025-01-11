<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'tag_id',
        'unique_artwork_tag'
    ];

    /**
     * Get the artwork that this tag is associated with.
     */
    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    /**
     * Get the tag that is associated with this artwork.
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
