<?php

namespace App\Http\Controllers;

use App\Models\TVShow;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation;

class TVShowController extends Controller
{
    public function random()
    {
        return view('randomtvshow', [
            'tvshow' => TVShow::inRandomOrder()->first()
        ]);
    }

    public function create()
    {
        return view('add.tvshow');
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'genre' => 'required|string|max:255',
            'releaseyear' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'seasons' => 'required|numeric',
            'episodes' => 'required|numeric',
            'watched' => 'boolean',
            'effort' => 'required|string|max:6'
        ]);

        if($request->get('watched') == null){
            $watched = 0;
        }
        else{
            $watched = request('watched');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,gif,svg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/tvshows'), $imageName);

        TVShow::create([
            'name' => request('name'),
            'image' => $imageName,
            'genre' => request('genre'),
            'releaseyear' => request('releaseyear'),
            'seasons' => request('seasons'),
            'episodes' => request('episodes'),
            'watched' => $watched,
            'effort' => request('effort')
        ]);

        return redirect('/addtvshow')->with('status', 'TV show added!');
    }
}
