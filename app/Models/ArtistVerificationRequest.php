<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtistVerificationRequest extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'status',
        'reason',
    ];

    /**
     * Get the user that submitted the verification request
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
