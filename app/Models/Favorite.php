<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'artwork_id',
        'user_id',
    ];

    /**
     * Get the user who favorited the artwork.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the artwork that was favorited by the user.
     */
    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }
}
