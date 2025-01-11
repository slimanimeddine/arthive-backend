<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkCommentLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_comment_id',
        'user_id',
        'unique_user_artwork_comment_like'
    ];

    /**
     * Get the comment that this like belongs to.
     */
    public function artworkComment(): BelongsTo
    {
        return $this->belongsTo(ArtworkComment::class);
    }

    /**
     * Get the user who liked the comment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
