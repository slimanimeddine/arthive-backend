<?php

namespace Database\Seeders;

use App\Models\Follow;
use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Database\Seeder;

class FollowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::artist()->get();

        // Loop through each user and assign random followers
        $users->each(function ($user) use ($users) {
            // Randomly decide how many users this user will follow
            $numberOfFollows = rand(1, 10); // Adjust the range as needed

            // Get a random subset of users to follow (excluding themselves)
            $randomUsersToFollow = $users->where('id', '!=', $user->id)->random($numberOfFollows);

            // Attach each follow relationship, ensuring no duplicates
            $randomUsersToFollow->each(function ($userToFollow) use ($user) {
                Follow::firstOrCreate([
                    'follower_id' => $user->id,
                    'followed_id' => $userToFollow->id,
                ]);

                $userToFollow->notify(new FollowNotification($user));
            });
        });
    }
}
