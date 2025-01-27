<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkPhoto;
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
    }
}
