<?php

namespace App\Models;

use Database\Factories\FaqFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /** @use HasFactory<FaqFactory> */
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'user_id',
    ];

    // elke faq hoort bij een gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
