<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'news_id',
    ];

    // een reactie hoort bij een gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // een reactie hoort bij een nieuwsartikel
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
