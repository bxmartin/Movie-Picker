<?php

namespace App\Http\Controllers;

use App\Models\Film;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'films' => Film::all()
        ]);
    }
}
