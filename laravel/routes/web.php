<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

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

Route::get('/', [RestaurantController::class, 'index'])->name('dish.index');




// commentata cosi non porta in dashbord dopo aver fatto il log
// e spostata ->middleware(['auth', 'verified']) in index
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROTTE CREATE
    Route::get('/dish', [RestaurantController::class, 'create'])->name('dish.create');

    //ROTTE STORE
    Route::post('/dish', [RestaurantController::class, 'store'])->name('dish.store');

    // ROTTE DELETE
    Route::delete('/{id}', [RestaurantController::class, 'destroy'])->name('dish.delete');

    // ROTTE EDIT
    Route::get('/dish/{id}/edit', [RestaurantController::class, 'edit'])->name('dish.edit');

    // ROTTE UPDATE
    Route::put('/dish/{id}', [RestaurantController::class, 'update'])->name('dish.update');


    //ROTTA DASHBOARD
    Route::get('/dashboard', [RestaurantController::class, 'dashboard'])->name('dashboard');
});



require __DIR__ . '/auth.php';
