<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = Artwork::all();

        ArtworkComment::factory(200)
            ->recycle($artworks)
            ->create();
    }
}
