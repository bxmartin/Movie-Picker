<?php

namespace App\View\Components\Dropdown;

use App\Models\Genre;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArchiveGenre extends Component
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
        return view('components.dropdown.archive-genre', [
            'genres' => Genre::all(),
            'currentGenre' => Genre::firstWhere('name', request('genre'))
        ]);
    }
}
