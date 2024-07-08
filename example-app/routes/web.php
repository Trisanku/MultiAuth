<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class,'index'])->name('account.login');
Route::get('/account/register', [LoginController::class,'register'])->name('account.register');
Route::get('/account/logout', [LoginController::class,'logout'])->name('account.logout');

Route::post('/account/process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
Route::post('/account/authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/dashboard', [DashboardController::class,'index'])->name('account.dashboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// // Auth::routes();



