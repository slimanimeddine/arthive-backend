<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtworkTag>
 */
class ArtworkTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artwork_id' => Artwork::factory(),
            'tag_id' => Tag::factory(),    
        ];
    }
}
