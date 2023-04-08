<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation;

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
            'image' => 'required|image|mimes:jpeg,gif,svg,png,jpg|max:2048',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
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
            'genre_id' => request('genre_id'),
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
            'image' => 'image|mimes:jpeg,gif,svg,png,jpg|max:2048',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
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
            $old_image_path = public_path('images/movies') . '/' . $movie->image;
            unlink($old_image_path);
            $imageName = time() . '.' . $request->image->extension();
            $attributes['image'] = request()->file('image')->move(public_path('images/movies'), $imageName);
        } else {
            $imageName = $movie->image;
        }

        $movie->update([
            'name' => request('name'),
            'image' => $imageName,
            'genre_id' => request('genre_id'),
            'releaseyear' => request('releaseyear'),
            'runtime' => request('runtime'),
            'watched' => $watched,
            'effort' => request('effort')
        ]);

        return back()->with('success', 'Movie Updated!');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $old_image_path = public_path('images/movies') . '/' . $movie->image;
        unlink($old_image_path);
        $movie->delete();

        return back()->with('danger', 'Movie Deleted!');
    }
}
