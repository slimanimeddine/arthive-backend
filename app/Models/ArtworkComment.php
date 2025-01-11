<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArtworkComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_text',
        'artwork_id',
        'user_id'
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

    /**
     * Get all replies to this comment.
     */
    public function replies(): HasMany
    {
        return $this->hasMany(ArtworkCommentReply::class);
    }

    /**
     * Get all likes for this comment.
     */
    public function likes(): HasMany
    {
        return $this->hasMany(ArtworkCommentLike::class);
    }
}
