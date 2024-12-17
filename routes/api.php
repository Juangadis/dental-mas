<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TreatmentController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('treatments', TreatmentController::class);
