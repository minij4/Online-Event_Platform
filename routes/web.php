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
Route::get('loged/createEvent', [EventController::class, 'createEvent']);
Route::get('loged/createStage', [EventController::class, 'createStage']);
Route::get('loged/createGame', [EventController::class, 'createGame']);
Route::get('loged/createTask', [EventController::class, 'createTask']);

Route::get('loged/tasks/{taskName?}/{taskType?}', [EventDataController::class, 'getGames']);

Route::get('loged/delete', [EventController::class, 'delete']);
Route::get('loged/startGame', [EventController::class, 'startGame']);

/// tasks

// Event data

Route::get('loged/createGame', [EventDataController::class, 'getEvents']);
Route::get('loged/delete', [EventDataController::class, 'getAllGames']);
Route::get('loged/edit', [EventDataController::class, 'getAllGames2']);
Route::get('loged/startGame', [EventDataController::class, 'getGames2']);


Route::post('postEvent', [EventDataController::class, 'postEvent'])->name('event.post'); 
Route::post('postGame', [EventDataController::class, 'postGame'])->name('game.post');
Route::post('postTask', [EventDataController::class, 'postTask'])->name('task.post');
Route::post('startGame', [EventDataController::class, 'startGame'])->name('start.post');

Route::post('deleteEvent', [EventDataController::class, 'deleteEvent'])->name('event.delete');
Route::post('deleteGame', [EventDataController::class, 'deleteGame'])->name('game.delete');
Route::post('deleteTask', [EventDataController::class, 'deleteTask'])->name('task.delete');

Route::post('editEvent', [EventDataController::class, 'editEvent'])->name('event.edit');
Route::post('editGame', [EventDataController::class, 'editGame'])->name('game.edit');
Route::post('editTask', [EventDataController::class, 'editTask'])->name('task.edit');


Route::post('updateEvent', [EventDataController::class, 'updateEvent'])->name('event.update');
Route::post('updateGame', [EventDataController::class, 'updateGame'])->name('game.update');
Route::post('updateTask1', [EventDataController::class, 'updateTask'])->name('task.update');
/// Play