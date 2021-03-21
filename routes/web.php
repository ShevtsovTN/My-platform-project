<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessagesController;
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

    Route::get('/news', [PageController::class, 'news'])->name('news');

    Route::get('/messages', [MessagesController::class, 'index'])->name('messagesList');
    Route::middleware(['admin.view'])->group(function () {
        Route::get('/messages/create', [MessagesController::class, 'create'])->name('createMessage');
        Route::post('/messages', [MessagesController::class, 'store'])->name('storeMessages');
    });
    Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('showMessage');
    //Route::get('/messages/{id}/edit', [MessagesController::class, 'edit'])->name('editMessage');
    Route::put('/messages/{id}', [MessagesController::class, 'update'])->name('updateMessage');
    Route::delete('/messages/{id}', [MessagesController::class, 'destroy'])->name('deleteMessage');

    Route::middleware(['view.childs'])->group(function () {
        Route::get('/users/{id}', [PageController::class, 'user'])->name('user');

        Route::get('/users/{id}/settings', [PageController::class, 'settings'])->name('userSettings');
        Route::post('/users/{id}/settings', [UserController::class, 'setSettings'])->name('setSettings');
    });
});
