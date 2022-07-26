<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;


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

Route::get('/login', [LoginController::class, 'index']);
Route::get('/registration', [LoginController::class, 'registration']);

Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');

Route::get('/logout',[LoginController::class, 'signout']);


Route::get('loged/home', [LoginController::class, 'home']);

