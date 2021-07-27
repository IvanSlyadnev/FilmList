<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\MarkController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    logger()->info("aaaa");
    return redirect()->route('films.index');
});

Route::get('films', [FilmController::class, 'index'])->name('films.index');
Route::get('films/{film}/show', [FilmController::class, 'show'])->name('films.show');

Route::group(['middleware' => ['auth']], function () {
    Route::post('films/{film}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comments/{film}/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::resource('films', FilmController::class)->except('index', 'show', 'update');
    Route::resource('creators', CreatorController::class);
    Route::post('films/{film}/mark', [MarkController::class, 'setMark'])->name('film.mark');
    Route::resource('countries', CountryController::class);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
