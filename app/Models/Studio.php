<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Anime;

class Studio extends Model
{
    use HasFactory;

    public function anime()
    {
        return $this->hasMany(Anime::class);
    }
}
