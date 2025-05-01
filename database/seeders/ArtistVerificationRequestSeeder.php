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
            $isArtistVerified = $artistverificationRequest->user->artist_verified_at;

            if ($isArtistVerified) {
                $artistverificationRequest->update([
                    'status' => fake()->randomElement(['approved']),
                ]);
            } else {
                $status = fake()->randomElement(['pending', 'rejected']);

                $reason = $status === 'rejected'
                    ? fake()->paragraph()
                    : null;
                $artistverificationRequest->update([
                    'status' => $status,
                    'reason' => $reason,
                ]);
            }

            $artistverificationRequest->user->notify(new ArtistVerificationResponseNotification($artistverificationRequest));
        }
    }
}
