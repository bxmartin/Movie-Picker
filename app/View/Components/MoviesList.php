<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Movie;
use App\Models\Genre;

class MoviesList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list-movies', [
            'movies' => Movie::orderBy('name')->filter(request(['search', 'genre']))->get(),
            'genre' => Genre::all()
        ]);
    }
}
