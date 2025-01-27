<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkLike;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = Artwork::all();
        $users = User::all();

        foreach ($users as $user) {
            foreach ($artworks as $artwork) {
                ArtworkLike::create([
                    'artwork_id' => $artwork->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
