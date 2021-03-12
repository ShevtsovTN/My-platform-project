<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'main'])->name('main');

Route::get('/login', [PageController::class, 'login'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('logIn');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [PageController::class, 'users'])->name('users');
    Route::get('/create', [PageController::class, 'create'])->name('createUserForm');
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::middleware(['view.childs'])->group(function () {
        Route::get('/users/{id}', [PageController::class, 'user'])->name('user');

        Route::get('/users/{id}/settings', [PageController::class, 'settings'])->name('userSettings');
        Route::post('/users/{id}/settings', [UserController::class, 'setSettings'])->name('setSettings');
    });
});
