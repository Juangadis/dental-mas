<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Treatment;

Route::get('/', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/treatments', [TreatmentController::class, 'store']);
Route::post('/categories', [CategoryController::class, 'store']);

require __DIR__.'/auth.php';
