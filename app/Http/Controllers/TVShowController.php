<?php

namespace App\Http\Controllers;

use App\Models\TVShow;

use Illuminate\Http\Request;

class TVShowController extends Controller
{
    public function create()
    {
        return view('add.tvshow');
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'episodes' => 'required|numeric',
            'watched' => 'boolean'
        ]);

        if($request->get('watched') == null){
            $watched = 0;
        }
        else{
            $watched = request('watched');
        }

        TVShow::create([
            'name' => request('name'),
            'genre' => request('genre'),
            'episodes' => request('episodes'),
            'watched' => $watched
        ]);

        return redirect('/addtvshow')->with('status', 'TV show added!');
    }
}
