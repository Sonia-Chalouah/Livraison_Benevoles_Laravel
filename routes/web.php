<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\BenevoleController;

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
});

require __DIR__.'/auth.php';

// Routes pour le modèle Livraison
Route::resource('/livraisons', LivraisonController::class);

// Routes spécifiques pour les livraisons
Route::get('/livraisons/create', [LivraisonController::class, 'create'])->name('livraisons.create');
Route::get('/livraisons/index', [LivraisonController::class, 'index'])->name('livraisons.index');
Route::post('/livraisons', [LivraisonController::class, 'store'])->name('livraisons.store');
Route::get('/livraisons/{id}', [LivraisonController::class, 'show'])->name('livraisons.show');
Route::get('/livraisons/{id}/edit', [LivraisonController::class, 'edit'])->name('livraisons.edit');
Route::put('/livraisons/{id}', [LivraisonController::class, 'update'])->name('livraisons.update');
Route::delete('/livraisons/{id}', [LivraisonController::class, 'destroy'])->name('livraisons.destroy');


// Routes pour le modèle Benevole
Route::resource('/benevoles', BenevoleController::class);

// Routes spécifiques pour les bénévoles
Route::get('/benevoles/create', [BenevoleController::class, 'create'])->name('benevoles.create');
Route::get('/benevoles', [BenevoleController::class, 'index'])->name('benevoles.index');
Route::post('/benevoles', [BenevoleController::class, 'store'])->name('benevoles.store');
Route::get('/benevoles/{id}', [BenevoleController::class, 'show'])->name('benevoles.show');
Route::get('/benevoles/{id}/edit', [BenevoleController::class, 'edit'])->name('benevoles.edit');
Route::put('/benevoles/{id}', [BenevoleController::class, 'update'])->name('benevoles.update');
Route::delete('/benevoles/{id}', [BenevoleController::class, 'destroy'])->name('benevoles.destroy');
