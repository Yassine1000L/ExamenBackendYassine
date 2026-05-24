<?php

namespace App\Models;

use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @use HasFactory<NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_at',
        'user_id',
    ];

    // elk nieuwsartikel hoort bij een gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // elk nieuws kan meerdere tags hebben
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // elk nieuws kan meerdere reacties hebben
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
