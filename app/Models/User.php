<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'country',
        'bio',
        'photo',
        'password',
        'artist_verified_at',
    ];

    /**
     * Get the artworks created by the user (artist).
     */
    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }

    /**
     * Get the users this user is following.
     */
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id',
            'followed_id'
        )->withTimestamps();
    }

    /**
     * Get the users who are following this user.
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_id',
            'follower_id'
        )->withTimestamps();
    }

    /**
     * Get the artworks this user has favorited.
     */
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(
            Artwork::class,
            'favorites',
            'user_id',
            'artwork_id'
        )->withTimestamps();
    }

    /**
     * Get the likes this user has given on artworks.
     */
    public function artworkLikes(): HasMany
    {
        return $this->hasMany(ArtworkLike::class);
    }

    /**
     * Get the comments this user has made on artworks.
     */
    public function artworkComments(): HasMany
    {
        return $this->hasMany(ArtworkComment::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Scope a query to only include verified users.
     */
    public function scopeVerified($query): void
    {
        $query->whereNotNull('artist_verified_at');
    }
}
