<?php

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtworkPhoto>
 */
class ArtworkPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $selectedPhoto = fake()->numberBetween(1, 40);
        return [
            'path' => "artwork-seeding-photos/{$selectedPhoto}.jpeg",
            'artwork_id' => Artwork::factory(),
            'is_main' => fake()->boolean()
        ];
    }
}
