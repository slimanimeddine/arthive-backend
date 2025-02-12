<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkPhoto;
use App\Models\ArtworkTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        Artwork::factory(200)
            ->recycle($users)
            ->create();

        $artworks = Artwork::all();

        ArtworkPhoto::factory(400)
            ->recycle($artworks)
            ->create();

        $tags = Tag::all();

        // Loop through each artwork and assign a random number of tags
        $artworks->each(function ($artwork) use ($tags) {
            // Randomly decide how many tags to assign to this artwork
            $numberOfTags = rand(1, 5);

            // Get a random subset of tags
            $randomTags = $tags->random($numberOfTags);

            // Attach each tag to the artwork, ensuring no duplicates
            $randomTags->each(function ($tag) use ($artwork) {
                ArtworkTag::firstOrCreate([
                    'artwork_id' => $artwork->id,
                    'tag_id' => $tag->id,
                ]);
            });
        });
    }
}
