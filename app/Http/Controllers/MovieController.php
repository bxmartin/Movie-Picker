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
        // $movies = Movie::inRandomOrder()->limit(10)->get();
        // return view('randommovie');

        return view('randommovie', [
            'movie' => Movie::inRandomOrder()->first()
        ]);
    }

    public function create()
    {
        return view('addmovie');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'genre' => 'required',
            'runtime' => 'required',
        ]);

        Movie::create($attributes);

        return redirect('/');
    }
}
