<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkCommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_text',
        'artwork_comment_id',
        'user_id'
    ];

    /**
     * Get the comment that this reply belongs to.
     */
    public function artworkComment(): BelongsTo
    {
        return $this->belongsTo(ArtworkComment::class);
    }

    /**
     * Get the user who made the reply.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
