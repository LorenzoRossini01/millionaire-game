<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\GameController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HintController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rotte per visualizzare il form per iniziare un nuovo gioco e per creare un nuovo gioco
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::post('/games', [GameController::class, 'create'])->name('games.create');

Route::post('/games/answer', [GameController::class, 'answer'])->name('games.answer');

// Rotta per mostrare una domanda durante il gioco
Route::get('/games/{game}/{question}', [GameController::class, 'show'])->name('games.show');

    Route::resource('questions', QuestionController::class);
    Route::resource('hints', HintController::class);
});

require __DIR__.'/auth.php';
