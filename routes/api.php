<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// users
Route::prefix('users')
    ->name('users.')
    ->namespace('App\Http\Controllers\User')
    ->group(fn () => Route::apiInvokables('users'));
    
// stores
Route::prefix('stores')
    ->name('stores.')
    ->namespace('App\Http\Controllers\Store')
    ->group(fn () => Route::apiInvokables('stores'));