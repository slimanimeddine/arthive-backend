<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, Searchable;

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
        'role'
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isArtist(): bool
    {
        return $this->role === 'artist';
    }

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
        'pivot'
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

    /**
     * Scope a query to only include unverified users.
     */
    public function scopeUnverified($query): void
    {
        $query->whereNull('artist_verified_at');
    }

    /**
     * Scope a query to only include users who are artists.
     */
    public function scopeArtist($query): void
    {
        $query->where('role', 'artist');
    }

    /**
     * Scope a query to only include users who are admins.
     */
    public function scopeAdmin($query): void
    {
        $query->where('role', 'admin');
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'users_index';
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
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'bio' => $this->bio,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    /**
     * Determine if the model should be searchable.
     */
    public function shouldBeSearchable(): bool
    {
        return $this->isArtist();
    }

    /**
     * The channels the user receives notification broadcasts on.
     */
    public function receivesBroadcastNotificationsOn(): string
    {
        return $this->isArtist()
            ? 'users.' . $this->id
            : 'admins';
    }
}
