<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Retweet extends Pivot
{
    use HasFactory;

    protected $table = 'retweets'; 
    public $incrementing = true;
    protected $fillable = [
        'user_id',
        'tweet_id',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id');
    }
}
