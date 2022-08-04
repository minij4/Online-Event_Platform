<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDataController;


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

/// Loged out

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/registration', [LoginController::class, 'registration']);

Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');

Route::get('/logout',[LoginController::class, 'signout']);


/// Loged in 
Route::get('loged/home', [EventController::class, 'home']);

/// menu
Route::get('loged/event', [EventController::class, 'event']);
Route::get('loged/createEvent', [EventController::class, 'createEvent']);
Route::get('loged/createStage', [EventController::class, 'createStage']);
Route::get('loged/createGame', [EventController::class, 'createGame']);
Route::get('loged/createTask', [EventController::class, 'createTask']);
Route::get('loged/delete', [EventController::class, 'delete']);
Route::get('loged/startGame', [EventController::class, 'startGame']);

/// tasks

Route::get('loged/tasks/photoBlur', [EventController::class, 'photoBlur']);
Route::get('loged/tasks/photoMosaic', [EventController::class, 'photoMosaic']);
Route::get('loged/tasks/photo', [EventController::class, 'photo']);
Route::get('loged/tasks/videoBlur', [EventController::class, 'videoBlur']);
Route::get('loged/tasks/video', [EventController::class, 'video']);
Route::get('loged/tasks/audio', [EventController::class, 'audio']);


// Event data

Route::get('loged/createGame', [EventDataController::class, 'getEvents']);
Route::get('loged/tasks/photoBlur', [EventDataController::class, 'getGames']);
Route::get('loged/delete', [EventDataController::class, 'getAllGames']);
Route::get('loged/startGame', [EventDataController::class, 'getGames2']);


Route::post('postEvent', [EventDataController::class, 'postEvent'])->name('event.post'); 
Route::post('postGame', [EventDataController::class, 'postGame'])->name('game.post');
Route::post('postTask', [EventDataController::class, 'postTask'])->name('task.post');

Route::post('deleteEvent', [EventDataController::class, 'deleteEvent'])->name('event.delete');
Route::post('deleteGame', [EventDataController::class, 'deleteGame'])->name('game.delete');
Route::post('deleteTask', [EventDataController::class, 'deleteTask'])->name('task.delete');






/// Play