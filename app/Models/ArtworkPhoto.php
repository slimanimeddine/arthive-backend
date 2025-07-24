<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkPhoto extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'path',
        'artwork_id',
        'is_main',
    ];

    /**
     * Get the artwork that this photo belongs to.
     */
    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }
}
