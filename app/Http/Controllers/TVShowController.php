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
            'tvshow' => TVShow::inRandomOrder()->where('watched','=',0)->first()
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
            'image' => 'required|image|mimes:jpeg,gif,svg,png,jpg|max:2048',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'releaseyear' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'seasons' => 'required|numeric',
            'episodes' => 'required|numeric',
            'watched' => 'boolean',
            'effort' => 'required|string|max:6'
        ]);

        if ($request->get('watched') == null) {
            $watched = 0;
        } else {
            $watched = request('watched');
        }

        $imageName = time() . '.' . $request->image->extension();
        $attributes['image'] = request()->file('image')->move(public_path('images/tvshows'), $imageName);

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

        return redirect('/addtvshow')->with('status', 'TV show added!');
    }
    public function edit(TVShow $tvshow)
    {
        return view('edit.tvshow', ['tvshow' => $tvshow]);
    }

    public function update(Request $request, TVShow $tvshow)
    {

        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,gif,svg,png,jpg|max:2048',
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'releaseyear' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'seasons' => 'required|numeric',
            'episodes' => 'required|numeric',
            'watched' => 'boolean',
            'effort' => 'required|string|max:6'
        ]);

        if ($request->get('watched') == null) {
            $watched = 0;
        } else {
            $watched = request('watched');
        }

        if (isset($attributes['image'])) {
            //delete old image path
            $old_image_path = public_path('images/tvshows') . '/' . $tvshow->image;
            unlink($old_image_path);
            //update new image
            $imageName = time() . '.' . $request->image->extension();
            $attributes['image'] = request()->file('image')->move(public_path('images/tvshows'), $imageName);
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
            'effort' => request('effort')
        ]);

        return redirect('/')->with('success', 'TV show Updated!');
    }

    public function destroy($id)
    {
        $tvshow = TVShow::findOrFail($id);
        $old_image_path = public_path('images/tvshows') . '/' . $tvshow->image;
        unlink($old_image_path);
        $tvshow->delete();

        return back()->with('danger', 'TV show Deleted!');
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
