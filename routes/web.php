<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Plan\PlanController;
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
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
});

Route::post('/treatments', [TreatmentController::class, 'store']);
Route::post('/categories', [CategoryController::class, 'store']);

Route::post('/process_payment', [PaymentController::class, 'process_payment'])->name('process_payment');

require __DIR__.'/auth.php';
