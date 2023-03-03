<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\TVShow;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'movies' => Movie::all(),
            'tvshows' => TVShow::all()
        ]);
    }
}
