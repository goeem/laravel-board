<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'title',
        'content',
        'interest_id',
        'user_id',
    ];
    
    public function interest()
    {
        return $this->belongsTo(Interest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

