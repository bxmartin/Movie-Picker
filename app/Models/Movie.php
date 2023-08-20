<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Movie extends Model
{
    use HasFactory;
    public $table = 'movies';
    protected $fillable = ['name', 'image', 'releaseyear', 'effort', 'runtime', 'rating', 'watched'];
    protected $with = ['genre'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('name', 'like', '%' . $search . '%'));
                //->orWhere('body', 'like', '%' . $search . '%'));
    }

}
