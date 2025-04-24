<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('app:create-admin-user', [
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        User::factory(200)->create();
    }
}
