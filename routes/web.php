<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

require __DIR__.'/auth.php';

Route::get('/dashboard', [TaskController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::patch('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});