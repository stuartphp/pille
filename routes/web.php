<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth','web', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('user-profile', function(){ return view('user-profile');})->name('user-profile');
    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/users', function(){ return view('admin.users.users'); })->name('users');
        Route::get('/permissions', function(){ return view('admin.users.permissions'); })->name('permissions');
        Route::resource('roles', App\Http\Controllers\Admin\Users\RolesController::class);
    });
    Route::prefix('items')->as('items.')->group(function () {
        Route::get('list', function(){ return view('items.index'); })->name('index');
    });
    Route::prefix('orders')->as('orders.')->group(function () {
        Route::get('list', [\App\Http\Controllers\Orders\OrdersController::class, 'index'])->name('list');
        Route::get('create', [\App\Http\Controllers\Orders\OrdersController::class, 'create'])->name('create');
        Route::get('edit/{id}', [\App\Http\Controllers\Orders\OrdersController::class, 'edit'])->name('edit');
    });
    Route::prefix('medical')->as('medical.')->group(function () {
        Route::get('general', function(){ return view('medical.general');})->name('general');
        Route::get('herbal', function(){ return view('medical.herbal');})->name('herbal');
        Route::get('pharmaceutical', function(){ return view('medical.pharmaceutical');})->name('pharmaceutical');
        Route::get('steroids', function(){ return view('medical.steroids');})->name('steroids');
    });
});
