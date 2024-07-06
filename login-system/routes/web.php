<?php
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});


Route::get('/account/login',[LoginController::class, 'index'])->name('account.login');  
Route::post('/account/authenticate',[LoginController::class, 'authenticate'])->name('account.authenticate');  
    