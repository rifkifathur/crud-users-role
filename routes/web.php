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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/users/data', [App\Http\Controllers\DataController::class, 'index'])->name('users-index-app');
        Route::get('/users/create', [App\Http\Controllers\DataController::class, 'create'])->name('users-create-app');
        Route::post('/users/store', [App\Http\Controllers\DataController::class, 'store'])->name('users-store-app');
        Route::get('/users/{id}', [App\Http\Controllers\DataController::class, 'edit'])->name('users-edit-app');
        Route::post('/users/{id}', [App\Http\Controllers\DataController::class, 'update'])->name('users-update-app');
        Route::delete('/users/{id}', [App\Http\Controllers\DataController::class, 'destroy'])->name('users-delete-app');

        Route::get('/trash', [App\Http\Controllers\DataController::class, 'trash'])->name('trash');
        Route::post('/trash/restore/{id}', [App\Http\Controllers\DataController::class, 'restore'])->name('restore');
        Route::delete('/trash/delete/{id}', [App\Http\Controllers\DataController::class, 'deletePermanent'])->name('remove');

    });
});
