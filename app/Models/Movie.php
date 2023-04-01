<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $table = 'movies';
    protected $fillable = ['name', 'image', 'genre', 'releaseyear', 'effort', 'runtime', 'rating', 'watched'];

}
