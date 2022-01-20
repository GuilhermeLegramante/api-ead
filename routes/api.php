<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\ReplySupportController;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    
    Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);
    
    Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);
    
    Route::get('/supports', [SupportController::class, 'index']);
    Route::get('/my-supports', [SupportController::class, 'indexFromUser']);
    
    Route::post('/supports', [SupportController::class, 'store']);
    
    Route::post('/replies', [ReplySupportController::class, 'store']);
});


