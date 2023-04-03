<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation;
Use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function random()
    {
        return view('randommovie', [
            'movie' => Movie::inRandomOrder()->first()
        ]);
    }

    public function create()
    {
        return view('add.movie');
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'genre' => 'required|string|max:50',
            'releaseyear' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'runtime' => 'required|numeric',
            'watched' => 'boolean',
            'effort' => 'required|string|max:6'
        ]);

        if ($request->get('watched') == null) {
            $watched = 0;
        } else {
            $watched = request('watched');
        }

        $imageName = time() . '.' . $request->image->extension();
        $attributes['image'] = request()->file('image')->move(public_path('images/movies'), $imageName);

        Movie::create([
            'name' => request('name'),
            'image' => $imageName,
            'genre' => request('genre'),
            'releaseyear' => request('releaseyear'),
            'runtime' => request('runtime'),
            'watched' => $watched,
            'effort' => request('effort')
        ]);

        return redirect('/addmovie')->with('status', 'Movie added!');
    }

    public function edit(Movie $movie)
    {
        return view('edit.movie', ['movie' => $movie]);
    }

    public function update(Request $request, Movie $movie)
    {

        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'image' => 'image',
            'genre' => 'required|string|max:50',
            'releaseyear' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'runtime' => 'required|numeric',
            'watched' => 'boolean',
            'effort' => 'required|string|max:6',
            'rating' => 'numeric|nullable'
        ]);

        if ($request->get('watched') == null) {
            $watched = 0;
        } else {
            $watched = request('watched');
        }

        if (isset($attributes['image'])) {
            $imageName = time() . '.' . $request->image->extension();
            $attributes['image'] = request()->file('image')->move(public_path('images/movies'), $imageName);
        }

        $movie->update([
            'name' => request('name'),
            'image' => $imageName,
            'genre' => request('genre'),
            'releaseyear' => request('releaseyear'),
            'runtime' => request('runtime'),
            'watched' => $watched,
            'effort' => request('effort')
        ]);

        return back()->with('success', 'Movie Updated!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return back()->with('success', 'Movie Deleted!');
    }
}
