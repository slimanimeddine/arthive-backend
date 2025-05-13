<?php

namespace Database\Seeders;

use App\Models\ArtistVerificationRequest;
use App\Models\User;
use App\Notifications\ArtistVerificationRequestNotification;
use Illuminate\Database\Seeder;

class ArtistVerificationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::artist()->get();

        foreach ($users as $user) {
            ArtistVerificationRequest::create([
                'user_id' => $user->id,
            ]);

            $adminUsers = User::where('role', 'admin')->get();

            foreach ($adminUsers as $adminUser) {
                $adminUser->notify(new ArtistVerificationRequestNotification($user));
            }
        }
    }
}
