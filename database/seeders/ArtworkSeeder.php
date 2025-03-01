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
        $users = User::artist()->get();

        Artwork::factory(200)
            ->recycle($users)
            ->create();

        $artworks = Artwork::all();

        // Loop through each artwork to assign photos
        foreach ($artworks as $artwork) {
            // Generate a random number of photos (between 1 and 4)
            $photos = ArtworkPhoto::factory(rand(1, 4))
                ->create(['artwork_id' => $artwork->id]);

            // Randomly select ONE photo and set it as the main photo
            $mainPhoto = $photos->random();
            $mainPhoto->update(['is_main' => true]);
        }

        $tags = Tag::all();

        // Loop through each artwork and assign a random number of tags
        $artworks->each(function ($artwork) use ($tags) {
            // Randomly decide how many tags to assign to this artwork
            $numberOfTags = rand(1, 3);

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
