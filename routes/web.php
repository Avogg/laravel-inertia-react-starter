<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::group(['prefix' => 'admins', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admins.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('admins.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admins.users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('admins.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admins.users.edit');
    Route::put('/users/{user}/edit', [UserController::class, 'update'])->name('admins.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admins.users.destroy');
    Route::get('/users/get', [UserController::class, 'getUsers'])->name('admins.users.getusers');
});
