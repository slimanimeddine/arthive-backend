<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'artwork_id',
    ];

    /**
     * Get the artwork that this photo belongs to.
     */
    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }
}
