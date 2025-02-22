<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Models\Favorite;
use App\Models\User;

class ArtworkPolicy
{
    /**
     * Determine whether the user can create a draft.
     */
    public function createArtwork(User $user): bool
    {
        return $user->isArtist();
    }

    /**
     * Determine whether user can upload photos to artwork
     */
    public function uploadArtworkPhotos(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;
        $isDraft = $artwork->isDraft();

        return $isArtist && $isOwner && $isDraft;
    }

    /**
     * Determine whether user can update artwork
     */
    public function updateArtwork(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;
        $isDraft = $artwork->isDraft();

        return $isArtist && $isOwner && $isDraft;
    }

    /**
     * Determine whether user can publish artwork
     */
    public function publishArtwork(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;
        $isDraft = $artwork->isDraft();

        return $isArtist && $isOwner && $isDraft;
    }

    /**
     * Determine whether user can delete artwork
     */
    public function deleteArtwork(User $user, Artwork $artwork): bool
    {
        $isArtist = $user->isArtist();
        $isOwner = $user->id === $artwork->user_id;

        return $isArtist && $isOwner;
    }

    /**
     * Determine whether user can like artwork.
     */
    public function likeArtwork(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->isArtist();

        $isPublished = $artwork->isPublished();

        $alreadyLiked = ArtworkLike::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && !$alreadyLiked && $isPublished;
    }

    /**
     * Determine whether user can unlike artwork.
     */
    public function unlikeArtwork(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->isArtist();

        $isPublished = $artwork->isPublished();

        $alreadyLiked = ArtworkLike::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && $alreadyLiked && $isPublished;
    }

    /**
     * Determine whether the user can post a comment.
     */
    public function postArtworkComment(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->isArtist();

        $isPublished = $artwork->isPublished();

        return $isUserArtist && $isPublished;
    }

    /**
     * Determine whether the user can mark artwork as favorite.
     */
    public function markArtworkAsFavorite(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->isArtist();

        $isPublished = $artwork->isPublished();

        $alreadyFavorited = Favorite::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && !$alreadyFavorited && $isPublished;
    }

    /**
     * Determine whether the user can remove artwork from favorites.
     */
    public function removeArtworkFromFavorites(User $user, Artwork $artwork): bool
    {
        $isUserArtist = $user->isArtist();

        $isPublished = $artwork->isPublished();

        $alreadyFavorited = Favorite::where('user_id', $user->id)
            ->where('artwork_id', $artwork->id)
            ->exists();

        return $isUserArtist && $alreadyFavorited && $isPublished;
    }
}
