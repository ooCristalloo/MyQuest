<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/userquests', [TestController::class, 'index'])->name('userquests');
    Route::get('/createquests', [TestController::class, 'create'])->name('tests.createquests');
    Route::post('/userquests', [TestController::class, 'store'])->name('tests.store');
    Route::delete('/tests/{id}', [TestController::class, 'destroy'])->name('tests.destroy');
    Route::get('/tests/{id}/results', [TestController::class, 'viewResults'])->name('tests.view-results');
});


Route::get('/test/{url}', [TestController::class, 'show'])->name('tests.show');
Route::post('/test/{url}/submit', [TestController::class, 'submit'])->name('tests.submit');
Route::get('/test-result/{id}', [TestController::class, 'result'])->name('tests.result');


require __DIR__.'/auth.php';
