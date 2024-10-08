<?php

use App\Http\Controllers\Principal;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

//Inicio
Route::get('/dashboard', [Principal::class, 'principal'])->middleware(['auth', 'verified'])->name('dashboard');


//Diploma
Route::get('/diploma', [Principal::class, 'diploma'])->middleware(['auth', 'verified'])->name('diploma');
Route::post('/generar-diploma', [Principal::class, 'generarDiploma'])->middleware(['auth', 'verified'])->name('generarDiploma');

//Diplomas
Route::get('/diplomas', [Principal::class, 'diplomas'])->middleware(['auth', 'verified'])->name('diplomas');
Route::post('/generarDiplomas', [Principal::class, 'generarDiplomas'])->middleware(['auth', 'verified'])->name('generarDiplomas');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
