<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVShow extends Model
{
    use HasFactory;
    public $table = 'tvshows';
    protected $fillable = ['name', 'genre', 'episodes', 'watched'];
}
