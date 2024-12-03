<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TournamentController::class, 'index'])->name('homepage');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/inschrijven', [TournamentController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/inschrijven', [TournamentController::class, 'registerPlayer']);


Route::get('/competitie/{tournament}', [TournamentController::class, 'generateSchedule'])->name('competition.schedule');

Route::get('/generate-schedule/{tournamentId}', [TournamentController::class, 'generateSchedule'])->name('generate.schedule');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/games/{id}/edit', [GamesController::class, 'edit'])->name('games.edit');
    Route::post('/games/{id}/update', [GamesController::class, 'update'])->name('games.update');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/team/{id}', [AdminController::class, 'deleteTeam'])->name('admin.team.delete');
});


require __DIR__.'/auth.php';
