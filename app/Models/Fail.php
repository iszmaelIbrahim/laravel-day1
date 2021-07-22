<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Anime;

class Fail extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'file_path'
    ];

}
