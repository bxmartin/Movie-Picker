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
            'movies' => Movie::paginate(5, ['*'], 'movies'),
            'tvshows' => TVShow::paginate(5, ['*'], 'tvshows')
        ]);
    }
}
