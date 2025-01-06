<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get existing users
        $users = User::whereIn('id', range(1, 50))->get();

        foreach ($users as $user) {
            $tweetCount = $faker->numberBetween(1, 10); // Create 1 to 10 tweets per user

            for ($i = 0; $i < $tweetCount; $i++) {
                $user->tweets()->create([
                    'message' => $faker->sentence(rand(3, 8)),
                ]);
            }
        }
    }
}