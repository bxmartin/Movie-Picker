<?php

namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // return view('welcome', [
        //     'movies' => Movie::all()
        // ]);
    }

    public function random()
    {
        return view('randommovie', [
            'movie' => Movie::inRandomOrder()->first()
        ]);
    }

    public function create()
    {
        return view('addmovie');
    }

    public function store(Request $request)
    {

        $this->validate(request(), [

            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'releaseyear' => 'required|numeric',
            'runtime' => 'required|numeric',
            'watched' => 'boolean'

        ]);

        if($request->get('watched') == null){
            $watched = 0;
        }
        else{
            $watched = request('watched');
        }

        Movie::create([
            'name' => request('name'),
            'genre' => request('genre'),
            'releaseyear' => request('releaseyear'),
            'runtime' => request('runtime'),
            'watched' => $watched
        ]);

        return redirect('addmovie')->with('status', 'Movie added!');
    }

}
