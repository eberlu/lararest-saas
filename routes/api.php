<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Actions\User\Login as UserLogin;
use App\Actions\User\GetCurrentLogged;
use App\Actions\User\GetStores;
use App\Actions\User\NewStore;
use App\Actions\User\ShowStore;
use App\Actions\User\UpdateStore;
use App\Actions\User\DestroyStore;

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

// Auth for users
Route::prefix('auth/user')
->name('auth.user.')
->group(function(){

    Route::post('login', UserLogin::class)->name('login');

    Route::get('/current', GetCurrentLogged::class)->name('current');

});

// Users
Route::prefix('users')
->name('users.')
->group(function(){

    // UserStores
    Route::prefix('{user}/stores')
    ->name('stores.')
    ->group(function() {

        Route::get('/', GetStores::class)->name('index');
        Route::post('/', NewStore::class)->name('store');
        Route::get('/{store}', ShowStore::class)->name('show');
        Route::put('/{store}', UpdateStore::class)->name('update');
        Route::delete('/{store}', DestroyStore::class)->name('destroy');
    });


});
