<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication User Route
Route::get('/', [AuthController::class, 'dashboard']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Route
Route::get('/home', [HomeController::class, 'home'])->name('home');

// Presence route
Route::get('/presence', [PresenceController::class, 'create'])->name('create_presence');
Route::post('/presence', [PresenceController::class, 'store'])->name('store_presence');
Route::get('/presence/{presence}/edit', [PresenceController::class, 'edit'])->name('edit_presence');
Route::patch('/presence/{presence}/update', [PresenceController::class, 'update'])->name('update_presence');

// Users Route
Route::get('/users', [UserController::class, 'index'])->name('users');
