<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVShowController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImageController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/random', [MovieController::class, 'random'])->name('randommovie');
    //add a movie
    Route::get('/addmovie', [MovieController::class, 'create'])->name('addmovie');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('createmovie');
    //add a tv show
    Route::get('/addtvshow', [TVShowController::class, 'create'])->name('addtvshow');
    Route::post('/admin/tvshow', [TVShowController::class, 'store'])->name('createtvshow');
    //profiles

    //profiles
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //images
    Route::get('upload-image', [ImageController::class, 'index']);
    Route::post('upload-image', [ImageController::class, 'store'])->name('image.store');
});

require __DIR__ . '/auth.php';
