<?php

use Illuminate\Support\Facades\Route;

// 
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/task", TaskController::class);
Route::delete('/task/clear', [TaskController::class, 'clear'])->name('task.clear');
