<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function list(Genre $genre)
    {

        $genre = Genre::select('name', 'id')
        ->orderBy('name', 'asc')
        ->get();

        return view('list.genres', [
            'genres' => $genre
        ]);
    }

    public function create()
    {
        return view('add.genre');
    }

    public function store()
    {

        $this->validate(request(), [
            'name' => 'required|string|unique:genres|max:255|min:2',
        ]);

        Genre::create([
            'name' => request('name'),
        ]);

        return redirect('/addgenre')->with('status', 'Genre added!');
    }

    public function edit(Genre $genre)
    {
        return view('edit.genre', ['genre' => $genre]);
    }

    public function update(Genre $genre)
    {

        $this->validate(request(), [
            'name' => 'required|string|max:255'
        ]);

        $genre->update([
            'name' => request('name')
        ]);

        return redirect('/genres')->with('success', 'Genre Updated!');
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return back()->with('danger', 'Genre Deleted!');
    }

}
