<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Models\User;
use App\Notifications\ArtworkLikeNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all artworks and users
        $artworks = Artwork::published()->get();
        $users = User::artist()->get();

        // Loop through each user and assign likes to random artworks
        $users->each(function ($user) use ($artworks) {
            // Randomly decide how many artworks this user will like
            $numberOfLikes = rand(1, 10); // Adjust the range as needed

            // Get a random subset of artworks
            $randomArtworks = $artworks->random($numberOfLikes);

            // Attach each artwork to the user as a like, ensuring no duplicates
            $randomArtworks->each(function ($artwork) use ($user) {
                ArtworkLike::firstOrCreate([
                    'user_id' => $user->id,
                    'artwork_id' => $artwork->id,
                ]);

                $artwork->user->notify(new ArtworkLikeNotification($user, $artwork));
            });
        });
    }
}
