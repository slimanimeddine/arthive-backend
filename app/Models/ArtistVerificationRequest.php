<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtistVerificationRequest extends Model
{
    use HasFactory, HasUlids;

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
