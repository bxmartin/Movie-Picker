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
            'movie' => Movie::inRandomOrder()->where('watched', '=', 0)->first()
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
            'image' => 'nullable|image|mimes:jpeg,gif,svg,png,jpg|max:2048',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'releaseyear' => 'digits:4|integer|min:1900|nullable|max:' . (date('Y') + 1),
            'runtime' => 'numeric|nullable',
            'watched' => 'boolean',
            'effort' => 'required|string|max:6'
        ]);

        //set a default movie image if not set
        if ($request->get('image') == null) {
            $imageName = null;
        } else {
            $imageName = time() . '.' . $request->image->extension();
            $attributes['image'] = request()->file('image')->move(public_path('images/movies'), $imageName);
        }

        if ($request->get('watched') == null) {
            $watched = 0;
        } else {
            $watched = request('watched');
        }

        Movie::create([
            'name' => request('name'),
            'image' => $imageName,
            'genre_id' => request('genre_id'),
            'releaseyear' => request('releaseyear'),
            'runtime' => request('runtime'),
            'watched' => $watched,
            'effort' => request('effort')
        ]);

        return redirect('/addmovie')->with('success', 'Movie added!');
    }

    public function edit(Movie $movie)
    {
        return view('edit.movie', ['movie' => $movie]);
    }

    public function update(Request $request, Movie $movie)
    {

        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,gif,svg,png,jpg|max:2048|nullable',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'releaseyear' => 'digits:4|integer|min:1900|nullable|max:' . (date('Y') + 1),
            'runtime' => 'numeric|nullable',
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
            //if image was null, don't try to delete the old image
            if ($request->get('image') == null) {
                $imageName = time() . '.' . $request->image->extension();
                $attributes['image'] = request()->file('image')->move(public_path('images/movies'), $imageName);
            } else {
                $old_image_path = public_path('images/movies') . '/' . $movie->image;
                unlink($old_image_path);
                $imageName = time() . '.' . $request->image->extension();
                $attributes['image'] = request()->file('image')->move(public_path('images/movies'), $imageName);
            }
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
            'effort' => request('effort'),
            'rating' => request('rating')
        ]);

        return redirect('/')->with('success', 'Movie Updated!');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        $old_image_path = public_path('images/movies') . '/' . $movie->image;
        unlink($old_image_path);
        $movie->delete();

        return back()->with('danger', 'Movie Deleted!');
    }

    public function watched(Movie $movie)
    {

        $this->validate(request(), [
            'watched' => 'boolean'
        ]);

        $movie->update([
            'watched' => 1
        ]);

        return back()->with('success', 'Movie marked watched!');
    }

    public function archive()
    {
        return view('archive.movies', [
            'movies' => Movie::latest()->where('watched', '=', 1)->filter(request(['search', 'genre']))->get()
        ]);
    }
}
