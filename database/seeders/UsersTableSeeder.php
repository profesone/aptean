<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'name' => 'Test Testerson',
            'username' => 'testuser',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'avatar' => 'assets/avatars/1.png',
            'remember_token' => Str::random(10),
        ]);

        // 50 more random users
        User::factory(50)->create()->each(function ($user) use ($faker) {
            $user->avatar = 'assets/avatars/' . rand(1, 4) . '.png';
            $user->save();
        });

        // Add following relationships
        $users = User::all();
        
        $users->each(function ($user) use ($users) {
            $followCount = rand(1, 15);
            $followIds = $users->except($user->id)
                             ->random($followCount)
                             ->pluck('id')
                             ->toArray();
            
            $user->following()->attach($followIds);
        });
    }
}
