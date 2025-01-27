<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'painting'
            ],
            [
                'name' => 'graphic'
            ],
            [
                'name' => 'sculpture'
            ],
            [
                'name' => 'folk art'
            ],
            [
                'name' => 'textile'
            ],
            [
                'name' => 'ceramics'
            ],
            [
                'name' => 'stained glass windows'
            ],
            [
                'name' => 'beads'
            ],
            [
                'name' => 'paper'
            ],
            [
                'name' => 'glass'
            ],
            [
                'name' => 'dolls'
            ],
            [
                'name' => 'jewellery'
            ],
            [
                'name' => 'fresco'
            ],
            [
                'name' => 'metal'
            ],
            [
                'name' => 'mosaic'
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
