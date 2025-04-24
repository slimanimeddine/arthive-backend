<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Artwork extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['artwork_likes_count', 'artwork_comments_count', 'artwork_main_photo_path'];

    /**
     * Get the user that created the artwork.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the photos of the artwork.
     */
    public function artworkPhotos(): HasMany
    {
        return $this->hasMany(ArtworkPhoto::class);
    }

    /**
     * Get the comments for the artwork.
     */
    public function artworkComments()
    {
        return $this->hasMany(ArtworkComment::class);
    }

    /**
     * Get the likes for the artwork.
     */
    public function artworkLikes()
    {
        return $this->hasMany(ArtworkLike::class);
    }

    /**
     * Get the tags for the artwork.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'artwork_tags');
    }

    /**
     * Scope a query to only include trending artworks
     */
    public function scopeTrending(Builder $query): void
    {
        $query->withCount(['artworkLikes' => function ($q) {
            $q->where('created_at', '>=', now()->subDays(7));
        }])
            ->orderBy('likes_count', 'desc');
    }

    /**
     * Scope a query to only include new artworks
     */
    public function scopeNew(Builder $query): void
    {
        $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope a query to only include published artworks
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published');
    }

    /**
     * Scope a query to only include drafts
     */
    public function scopeDraft(Builder $query): void
    {
        $query->where('status', 'draft');
    }

    /**
     * Get the count of likes for the artwork.
     */
    protected function artworkLikesCount(): Attribute
    {
        return new Attribute(
            get: fn () => $this->artworkLikes()->count(),
        );
    }

    /**
     * Get the count of comments for the artwork.
     */
    protected function artworkCommentsCount(): Attribute
    {
        return new Attribute(
            get: fn () => $this->artworkComments()->count(),
        );
    }

    /**
     * Get the main photo of the artwork.
     */
    public function artworkMainPhotoPath(): Attribute
    {
        $artworkMainPhoto = $this->artworkPhotos()->where('is_main', true)->first();

        return new Attribute(
            get: fn () => $artworkMainPhoto ? $artworkMainPhoto->path : null,
        );
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'artworks_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    /**
     * Determine if the model should be searchable.
     */
    public function shouldBeSearchable(): bool
    {
        return $this->isPublished();
    }
}
