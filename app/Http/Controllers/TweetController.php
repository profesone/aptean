<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
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
            'tweets_count' => $user->tweets()->count(),
            'followers_count' => $user->followers()->count(),
            'following_count' => $user->following()->count(),
        ];

        $tweets = Tweet::with('user')
            ->latest()
            ->paginate(10);

        // Suggest any other user
        $suggestedUsers = User::select('id','name','username','avatar')
            ->whereNot('id', $user->id)
            ->get();

        return Inertia::render('Tweets/Index', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'avatar' => $user->avatar,
                'stats' => $userStats,
            ],
            'tweets' => $tweets,
            'suggestedUsers' => $suggestedUsers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->tweets()->create($validated);
 
        return redirect(route('tweets.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}
