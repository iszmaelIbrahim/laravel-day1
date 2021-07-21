<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Studio;
use App\Models\Comment;

class Anime extends Model
{

    use HasFactory;

    
    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }    

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
