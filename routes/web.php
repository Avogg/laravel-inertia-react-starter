<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PsyquenceController;
use App\Http\Controllers\WrongWordController;
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
Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

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


Route::group(['middleware' => ['auth', 'subscribed']], function () {
    Route::get('/psyquence/templates', [PsyquenceController::class, 'indexTemplates'])->name('doctors.psyquence.templates');
    Route::get('/psyquence/templates/create', [PsyquenceController::class, 'createTemplates'])->name('doctors.psyquence.templates.create');
    Route::get('/psyquence/templates/{id}', [PsyquenceController::class, 'showTemplates'])->name('doctors.psyquence.templates.show');
    Route::get('/wrongword', [WrongWordController::class, 'index'])->name('doctors.wrongword.show');

    Route::get('/psyquence/create', [PsyquenceController::class, 'create'])->name('doctors.psyquence.create');
    Route::get('/psyquence', [PsyquenceController::class, 'index'])->name('doctors.psyquence.index');
    Route::get('/psyquence/{psyquenceGame}', [PsyquenceController::class, 'show'])->name('doctors.psyquence.show');
});
