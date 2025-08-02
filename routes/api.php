<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Note\NoteController;
use App\Http\Controllers\Section\SectionController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('sections', SectionController::class);
    Route::apiResource('notes', NoteController::class);
});
