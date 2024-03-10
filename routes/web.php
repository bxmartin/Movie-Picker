<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVShowController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GenreController;

use App\Models\Genre;
use App\Models\Movie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cleareverything', function () {

    $clearcache = Artisan::call('key:generate');
    echo "Key generated<br>";

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearcache = Artisan::call('route:clear');
    echo "Route cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $clearconfig = Artisan::call('optimize:clear');
    echo "Optimised<br>";

});

Route::middleware('auth')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/movies', [IndexController::class, 'movies'])->name('movies');
    Route::get('/tvshows', [IndexController::class, 'tvshows'])->name('tvshows');
    Route::get('/random', [MovieController::class, 'random'])->name('randommovie');
    Route::get('/randomtv', [TVShowController::class, 'random'])->name('randomtvshow');

    //add a movie
    Route::get('/addmovie', [MovieController::class, 'create'])->name('addmovie');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('createmovie');

    //add a tv show
    Route::get('/addtvshow', [TVShowController::class, 'create'])->name('addtvshow');
    Route::post('/admin/tvshow', [TVShowController::class, 'store'])->name('createtvshow');

    //genres
    Route::get('/genres', [GenreController::class, 'list'])->name('genres');
    Route::get('/addgenre', [GenreController::class, 'create'])->name('addgenre');
    Route::post('/admin/genre', [GenreController::class, 'store'])->name('creategenre');
    Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])->name('editgenre');
    Route::patch('/genre/{genre}/update', [GenreController::class, 'update']);
    Route::delete('/genre/{genre}/delete', [GenreController::class, 'destroy']);

    //profiles
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //edit a movie
    Route::get('/movie/{movie}/edit', [MovieController::class, 'edit']);
    Route::patch('/movie/{movie}/update', [MovieController::class, 'update']);
    Route::delete('/movie/{movie}/delete', [MovieController::class, 'destroy']);
    Route::patch('/movie/{movie}/watched', [MovieController::class, 'watched']);

    //edit a tv show
    Route::get('/tvshow/{tvshow}/edit', [TVShowController::class, 'edit']);
    Route::patch('/tvshow/{tvshow}/update', [TVShowController::class, 'update']);
    Route::delete('/tvshow/{tvshow}/delete', [TVShowController::class, 'destroy']);
    Route::patch('/tvshow/{tvshow}/watched', [TVShowController::class, 'watched']);

    //archive of watched titles
    Route::get('/archive/movies', [MovieController::class, 'archive'])->name('movie.archive');

});

require __DIR__ . '/auth.php';
