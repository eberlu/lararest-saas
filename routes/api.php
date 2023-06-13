<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User actions
use App\Actions\User\Login as UserLogin;
use App\Actions\User\Register as UserRegister;
use App\Actions\User\GetCurrentLogged as GetCurrentUserLogged;
use App\Actions\User\UpdateUser;
use App\Actions\User\DestroyUser;
use App\Actions\User\IndexStores;
use App\Actions\User\NewStore;
use App\Actions\User\ShowStore;
use App\Actions\User\UpdateStore;
use App\Actions\User\DestroyStore;
use App\Actions\User\Store\IndexCategories;
use App\Actions\User\Store\StoreCategory;
use App\Actions\User\Store\ShowCategory;
use App\Actions\User\Store\UpdateCategory;
use App\Actions\User\Store\DestroyCategory;
use App\Actions\User\Store\IndexProducts;
use App\Actions\User\Store\StoreProduct;
use App\Actions\User\Store\ShowProduct;
use App\Actions\User\Store\UpdateProduct;
use App\Actions\User\Store\DestroyProduct;

// Admin actions
use App\Actions\Admin\Login as AdminLogin;
use App\Actions\Admin\GetCurrentLogged as GetCurrentAdminLogged;
use App\Actions\Admin\IndexUsers;
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
    Route::get('/', IndexUsers::class)->name('index');
    Route::post('/', UserRegister::class)->name('store');
    Route::get('/{user}', ShowUser::class)->name('show');
    Route::put('/{user}', UpdateUser::class)->name('update');
    Route::delete('/{user}', DestroyUser::class)->name('destroy');

    // UserStores
    Route::prefix('{user}/stores')
    ->name('stores.')
    ->group(function() {

        Route::get('/', IndexStores::class)->name('index');
        Route::post('/', NewStore::class)->name('store');
        Route::get('/{store}', ShowStore::class)->name('show');
        Route::put('/{store}', UpdateStore::class)->name('update');
        Route::delete('/{store}', DestroyStore::class)->name('destroy');
    });
});

//StoreCategories
Route::prefix('user-stores/{store}/categories')
->name('user.stores.categories.')
->group(function() {

    Route::get('/', IndexCategories::class)->name('index');
    Route::post('/', StoreCategory::class)->name('store');
    Route::get('{category}', ShowCategory::class)->name('show');
    Route::put('{category}', UpdateCategory::class)->name('update');
    Route::delete('{category}', DestroyCategory::class)->name('destroy');
});

//StoreProducts
Route::prefix('user-stores/{store}/products')
->name('user.stores.products.')
->group(function() {

    Route::get('/', IndexProducts::class)->name('index');
    Route::post('/', StoreProduct::class)->name('store');
    Route::get('{product}', ShowProduct::class)->name('show');
    Route::put('{product}', UpdateProduct::class)->name('update');
    Route::delete('{product}', DestroyProduct::class)->name('destroy');
});
