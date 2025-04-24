<?php

namespace Database\Seeders;

use App\Models\ArtistVerificationRequest;
use App\Models\User;
use App\Notifications\ArtistVerificationRequestNotification;
use App\Notifications\ArtistVerificationResponseNotification;
use Illuminate\Database\Seeder;

class ArtistVerificationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::artist()->unverified()->get();

        foreach ($users as $user) {
            ArtistVerificationRequest::create([
                'user_id' => $user->id,
            ]);

            $adminUsers = User::where('role', 'admin')->get();

            foreach ($adminUsers as $adminUser) {
                $adminUser->notify(new ArtistVerificationRequestNotification($user));
            }
        }

        $artistverificationRequests = ArtistVerificationRequest::all();

        foreach ($artistverificationRequests as $artistverificationRequest) {
            $artistverificationRequest->update([
                'status' => fake()->randomElement(['approved', 'rejected']),
                'reason' => fake()->paragraph(),
            ]);

            $artistverificationRequest->user->notify(new ArtistVerificationResponseNotification($artistverificationRequest));
        }
    }
}
