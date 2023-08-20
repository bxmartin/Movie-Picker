<?php

namespace App\Http\Controllers;

use App\Models\TVShow;
use App\Models\Genre;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation;

class TVShowController extends Controller
{
    public function random()
    {
        return view('randomtvshow', [
            'tvshow' => TVShow::inRandomOrder()->where('watched', '=', 0)->first()
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
            'image' => 'nullable|image|mimes:jpeg,gif,svg,png,jpg|max:2048',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'releaseyear' => 'digits:4|integer|min:1900|nullable|max:' . (date('Y') + 1),
            'seasons' => 'numeric|nullable',
            'episodes' => 'numeric|nullable',
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

        TVShow::create([
            'name' => request('name'),
            'image' => $imageName,
            'genre_id' => request('genre_id'),
            'releaseyear' => request('releaseyear'),
            'seasons' => request('seasons'),
            'episodes' => request('episodes'),
            'watched' => $watched,
            'effort' => request('effort')
        ]);

        return redirect('/addtvshow')->with('success', 'TV show added!');
    }
    public function edit(TVShow $tvshow)
    {
        return view('edit.tvshow', ['tvshow' => $tvshow]);
    }

    public function update(Request $request, TVShow $tvshow)
    {

        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,gif,svg,png,jpg|max:2048|nullable',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'releaseyear' => 'digits:4|integer|min:1900|nullable|max:' . (date('Y') + 1),
            'seasons' => 'numeric|nullable',
            'episodes' => 'numeric|nullable',
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
                $attributes['image'] = request()->file('image')->move(public_path('images/tvshows'), $imageName);
            } else {
                $old_image_path = public_path('images/tvshows') . '/' . $tvshow->image;
                unlink($old_image_path);
                $imageName = time() . '.' . $request->image->extension();
                $attributes['image'] = request()->file('image')->move(public_path('images/tvshows'), $imageName);
            }
        } else {
            $imageName = $tvshow->image;
        }

        $tvshow->update([
            'name' => request('name'),
            'image' => $imageName,
            'genre_id' => request('genre_id'),
            'releaseyear' => request('releaseyear'),
            'seasons' => request('seasons'),
            'episodes' => request('episodes'),
            'watched' => $watched,
            'effort' => request('effort'),
            'rating' => request('rating')
        ]);

        return redirect('/')->with('success', 'TV show updated!');
    }

    public function destroy($id)
    {
        $tvshow = TVShow::findOrFail($id);

        //check image path, dont delete if default
        $old_image_path = public_path('images/tvshows') . '/' . $tvshow->image;
        if ($tvshow->image == null) {
            //do nothing
        } else {
            unlink($old_image_path);
        }

        $tvshow->delete();

        return back()->with('danger', 'TV show deleted!');
    }

    public function watched(TVShow $tvshow)
    {

        $this->validate(request(), [
            'watched' => 'boolean'
        ]);

        $tvshow->update([
            'watched' => 1
        ]);

        return back()->with('success', 'TV show marked as watched!');
    }
}
