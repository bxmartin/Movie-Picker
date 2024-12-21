<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class TVShow extends Model
{
    use HasFactory;
    public $table = 'tvshows';
    protected $fillable = ['name', 'image', 'releaseyear', 'seasons', 'episodes', 'effort', 'rating', 'watched'];
    protected $with = ['genre'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query
            ->where('name', 'like', '%' . $search . '%'));
        $query->when(
            $filters['genre'] ?? false,
            fn ($query, $genre) =>
            $query->whereHas(
                'genre',
                fn ($query) =>
                $query->where('name', $genre)
            )
        );
    }
}
