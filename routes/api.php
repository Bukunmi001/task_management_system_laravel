<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; 
use App\Http\Controllers\AuthController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route to get the authenticated user's information
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Grouped routes that require Sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});

// Routes for authentication (login and registration)
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
