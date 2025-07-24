<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkComment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'comment_text',
        'artwork_id',
        'user_id',
    ];

    /**
     * Get the artwork that owns the comment.
     */
    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    /**
     * Get the user who made the comment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
