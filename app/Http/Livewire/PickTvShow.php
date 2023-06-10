<?php

namespace App\Http\Livewire;

use App\Models\TVShow;

use Livewire\Component;

class PickTvShow extends Component
{

    protected $listeners = ['refreshTVShow' => '$refresh'];

    public function render()
    {
        return view('livewire.pick-tv-show', [
            'tvshow' => TVShow::inRandomOrder()->first(),
            'tvshows' => TVShow::all()
        ]);
    }
}
