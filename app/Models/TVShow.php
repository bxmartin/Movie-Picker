<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class TVShow extends Model
{
    use HasFactory;
    public $table = 'tvshows';
    protected $fillable = ['name', 'image', 'releaseyear', 'seasons', 'episodes', 'effort', 'watched'];
    protected $with = ['genre'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

}
