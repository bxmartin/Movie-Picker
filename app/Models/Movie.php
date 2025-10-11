<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use Kyslik\ColumnSortable\Sortable;

class Movie extends Model
{
    use HasFactory, Sortable;
    public $table = 'movies';
    protected $fillable = ['name', 'image', 'releaseyear', 'effort', 'genre', 'runtime', 'rating', 'watched', 'updated_at'];
    public $sortable = ['name', 'releaseyear', 'effort', 'genre', 'runtime', 'rating', 'created_at'];
    //protected $with = ['genre'];

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
