<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User actions
use App\Actions\User\Login as UserLogin;
use App\Actions\User\Register as UserRegister;
use App\Actions\User\GetCurrentLogged as GetCurrentUserLogged;
use App\Actions\User\UpdateUser;
use App\Actions\User\DestroyUser;
use App\Actions\User\GetStores;
use App\Actions\User\NewStore;
use App\Actions\User\ShowStore;
use App\Actions\User\UpdateStore;
use App\Actions\User\DestroyStore;

// Admin actions
use App\Actions\Admin\Login as AdminLogin;
use App\Actions\Admin\GetCurrentLogged as GetCurrentAdminLogged;
use App\Actions\Admin\GetUsers;
use App\Actions\Admin\ShowUser;

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

// Auth users
Route::prefix('auth/user')
->name('auth.user.')
->group(function(){

    Route::post('login', UserLogin::class)->name('login');

    Route::get('current', GetCurrentUserLogged::class)->name('current');

});

// Auth admins
Route::prefix('auth/admin')
->name('auth.admin.')
->group(function() {

    Route::post('login', AdminLogin::class)->name('login');

    Route::get('current', GetCurrentAdminLogged::class)->name('current');

});

// Users group
Route::prefix('users')
->name('users.')
->group(function(){

    // Users
    Route::get('/', GetUsers::class)->name('index');
    Route::post('/', UserRegister::class)->name('store');
    Route::get('/{user}', ShowUser::class)->name('show');
    Route::put('/{user}', UpdateUser::class)->name('update');
    Route::delete('/{user}', DestroyUser::class)->name('destroy');

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