<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    // Elke tag hoort bij meerdere nieuwsartikelen
    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
