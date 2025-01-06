<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Retweet;
use App\Models\User;
use App\Models\Tweet;
use Faker\Factory as Faker;

class RetweetSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get all users and tweets
        $users = User::all();
        $tweets = Tweet::all();

        foreach ($tweets as $tweet) {
            // Randomly select a number of users to retweet
            $numberOfRetweets = rand(1, 40); 

            for ($i = 0; $i < $numberOfRetweets; $i++) {
                $user = $users->random();

                Retweet::create([
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id,
                ]);
            }
        }
    }
}
