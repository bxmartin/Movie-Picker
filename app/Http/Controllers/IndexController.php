<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\TVShow;
use App\Models\Genre;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'movies' => Movie::orderBy('name')->get(),
            'tvshows' => TVShow::orderBy('name')->get()
        ]);
    }

    public function movies()
    {
        return view('movies', [
            'movies' => Movie::orderBy('name')->get(),
            'genres' => Genre::all()
        ]);
    }

    public function tvshows()
    {
        return view('tvshows', [
            'tvshows' => TVShow::orderBy('name')->get(),
            'genres' => Genre::all()
        ]);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->where('name', 'like', '%' . $search . '%')
        );

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
