<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TweetController extends Controller
{
    public function index(): Response
    {
        $user = Auth::user();
        
        $userStats = [
            'tweets_count'      => $user->tweets()->count(),
            'followers_count'   => $user->followers()->count(),
            'following_count'   => $user->following()->count(),
        ];

        return Inertia::render('Tweets/Index', [
            'user' => [
                'id'        => $user->id,
                'name'      => $user->name,
                'username'  => $user->username,
                'avatar'    => $user->avatar,
                'stats'     => $userStats,
            ],
            'tweets'            => $this->getTweets(),
            'suggested_users'   => $this->getSuggestedUsers(),
            'followers'         => $this->getFollowers(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->tweets()->create($validated);
 
        return redirect(route('tweets.index'));
    }

    private function getFollowers(): array
    {
        if (Auth::user()->id) {
            return Follower::where('follower_id', '=', Auth::user()->id)
                ->get()
                ->toArray();
        }
        
        return ['error' => 'Take a look at our suggested followers.'];
    }

    private function getSuggestedUsers(): array
    {
        if (Auth::user()->id) {
             return User::select('id','name','username','avatar')
                ->whereNot('id', Auth::user()->id)
                ->get()
                ->toArray();
        }
        
        return ['error' => 'You need to login.'];
    }

    private function getTweets()
    {
        return Tweet::with('user', 'retweet')->latest()->paginate(10);
    }
}
