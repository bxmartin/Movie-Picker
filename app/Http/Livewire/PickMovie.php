<?php

namespace App\Http\Livewire;

use App\Models\Movie;

use Livewire\Component;

class PickMovie extends Component
{

    protected $listeners = ['refreshMovie' => '$refresh'];

    public function render()
    {
        return view('livewire.pick-movie', [
            'movie' => Movie::inRandomOrder()->first(),
            'movies' => Movie::all()
        ]);
    }
}
