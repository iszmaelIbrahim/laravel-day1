<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Anime;

class Comment extends Model
{
    use HasFactory;

    public function studio()
    {
        return $this->belongsTo(Anime::class);
    }
}
