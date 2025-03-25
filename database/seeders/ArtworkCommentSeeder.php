<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkComment;
use App\Models\User;
use App\Notifications\ArtworkCommentNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all artworks and users
        $artworks = Artwork::published()->get();
        $users = User::artist()->get();

        // Loop through each artwork and assign comments from random users
        $artworks->each(function ($artwork) use ($users) {
            // Randomly decide how many comments this artwork will have
            $numberOfComments = rand(1, 5); // Adjust the range as needed

            // Get a random subset of users to comment on this artwork
            $randomUsers = $users->random($numberOfComments);

            // Attach comments to the artwork from the random users
            $randomUsers->each(function ($user) use ($artwork) {
                $comment = ArtworkComment::create([
                    'comment_text' => fake()->sentence(),
                    'artwork_id' => $artwork->id,
                    'user_id' => $user->id,
                ]);

                $artwork->user->notify(new ArtworkCommentNotification($user, $artwork, $comment));
            });
        });
    }
}
