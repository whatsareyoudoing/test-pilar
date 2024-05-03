<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Soal1Controller;
use App\Http\Controllers\Soal2Controller;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //soal1
        Route::get('/soal1', [Soal1Controller::class, 'index'])->name('soal1');
        Route::post('/soal1', [Soal1Controller::class, 'create'])->name('soal1');
        Route::get('/soal1/edit/{id}', [Soal1Controller::class, 'edit'])->name('soal1.edit');
        Route::get('/soal1/del/{id}', [Soal1Controller::class, 'delete'])->name('soal1.delete');
    //

    //soal2
        Route::get('/soal2', [Soal2Controller::class, 'index'])->name('soal2');
        Route::post('/soal2', [Soal2Controller::class, 'create'])->name('soal2.create');
        Route::get('/soal2/edit/{id}', [Soal2Controller::class, 'edit'])->name('soal2.edit');
        Route::get('/soal2/del/{id}', [Soal2Controller::class, 'delete'])->name('soal2.delete');
    //

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
