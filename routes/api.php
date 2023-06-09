<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\WeightController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/weights', [WeightController::class, 'store']);
// Route::get('/weights', [WeightController::class, 'index']);

Route::get('/weights', 'App\Http\Controllers\WeightController@index');
Route::post('/weights', 'App\Http\Controllers\WeightController@store');