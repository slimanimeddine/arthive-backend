<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = Artwork::all();
        $users = User::all();

        // Loop through each user and assign random favorite artworks
        $users->each(function ($user) use ($artworks) {
            // Randomly decide how many artworks this user will favorite
            $numberOfFavorites = rand(1, 10); // Adjust the range as needed

            // Get a random subset of artworks to favorite
            $randomArtworks = $artworks->random($numberOfFavorites);

            // Attach each favorite relationship, ensuring no duplicates
            $randomArtworks->each(function ($artwork) use ($user) {
                Favorite::firstOrCreate([
                    'user_id' => $user->id,
                    'artwork_id' => $artwork->id,
                ]);
            });
        });
    }
}
