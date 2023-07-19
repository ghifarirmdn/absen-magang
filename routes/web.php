<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerformanceController;
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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Route
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/performance', function () {
    return view('user.performance');
})->name('performance');

Route::get('/change-password', function () {
    return view('user.change_password');
})->name('change_password');

// Presence route
Route::get('/presence', [PresenceController::class, 'create'])->name('create_presence');
Route::post('/presence', [PresenceController::class, 'store'])->name('store_presence');
Route::get('/presence/{presence}/edit', [PresenceController::class, 'edit'])->name('edit_presence');
Route::patch('/presence/{presence}/update', [PresenceController::class, 'update'])->name('update_presence');
Route::get('/presence/export', [PresenceController::class, 'exportExcel'])->name('export_excel');
Route::get('/presence/recap', [PresenceController::class, 'recap'])->name('recap_presence');

// Users Route
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/user/create', [UserController::class, 'create'])->name('create_user');
Route::post('/user/store', [UserController::class, 'store'])->name('store_user');
Route::get('/user/{user}', [UserController::class, 'show'])->name('show_user');
Route::patch('/user/{user}/update', [UserController::class, 'update'])->name('update_user');
Route::delete('/user/{user}/delete', [UserController::class, 'delete'])->name('delete_user');
