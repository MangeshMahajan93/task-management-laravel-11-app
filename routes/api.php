<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',function()
{
    return "This is Sample Testing for API.";
});

Route::resource("/tasks", TaskAPIController::class);
Route::delete('/tasks/clear', [TaskAPIController::class, 'clear'])->name('tasks.clear');
