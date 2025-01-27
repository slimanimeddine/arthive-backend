<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('db:seed --class=TagSeeder');
        Artisan::call('db:seed --class=UserSeeder');
        Artisan::call('db:seed --class=ArtworkSeeder');
        Artisan::call('db:seed --class=ArtworkCommentSeeder');
        Artisan::call('db:seed --class=ArtworkLikeSeeder');
    }
}
