<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\EventController;

use App\Http\Controllers\PostDataController;
use App\Http\Controllers\EditDataController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\DeleteDataController;
use App\Http\Controllers\UpdateDataController;

use App\Http\Controllers\StartGameController;

use App\Http\Controllers\GameController;


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
    if(Session::get('nickname')) {
        return view('waitingRoom');
    }
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/registration', [LoginController::class, 'registration']);

Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');

Route::get('/logout',[LoginController::class, 'signout']);




/// Play
Route::get('sessionDelete', [GameController::class, 'sessionDelete']);
Route::get('game', [GameController::class, 'game']);
Route::get('waitingRoom', [GameController::class, 'waitingRoom']);

Route::post('postPlayer', [GameController::class, 'postPlayer'])->name('player.post');





/// Loged in 
Route::get('loged/home', [EventController::class, 'home']);



/// menu
Route::get('loged/createEvent', [EventController::class, 'createEvent']);
Route::get('loged/createStage', [EventController::class, 'createStage']);
Route::get('loged/createGame', [EventController::class, 'createGame']);
Route::get('loged/createTask', [EventController::class, 'createTask']);


Route::get('loged/delete', [EventController::class, 'delete']);
Route::get('loged/startGame', [EventController::class, 'startGame']);


Route::get('loged/tasks/{taskName?}/{taskType?}', [GetDataController::class, 'getGames']);

/// tasks
// Event data
Route::get('loged/createGame', [GetDataController::class, 'getEvents']);
Route::get('loged/delete', [GetDataController::class, 'getAllGames']);
Route::get('loged/edit', [GetDataController::class, 'getAllGames2']);
Route::get('loged/startGame', [GetDataController::class, 'getGames2']);


// POST EVENT DATA
Route::post('postEvent', [PostDataController::class, 'postEvent'])->name('event.post'); 
Route::post('postGame', [PostDataController::class, 'postGame'])->name('game.post');
Route::post('postTask', [PostDataController::class, 'postTask'])->name('task.post');

Route::post('startGame', [StartGameController::class, 'startGame'])->name('start.post');


// DELETE EVENT DATA
Route::post('deleteEvent', [DeleteDataController::class, 'deleteEvent'])->name('event.delete');
Route::post('deleteGame', [DeleteDataController::class, 'deleteGame'])->name('game.delete');
Route::post('deleteTask', [DeleteDataController::class, 'deleteTask'])->name('task.delete');

// EDIT EVENT DATA
Route::post('editEvent', [EditDataController::class, 'editEvent'])->name('event.edit');
Route::post('editGame', [EditDataController::class, 'editGame'])->name('game.edit');
Route::post('editTask', [EditDataController::class, 'editTask'])->name('task.edit');

// UPDATE EVENT DATA
Route::post('updateEvent', [UpdateDataController::class, 'updateEvent'])->name('event.update');
Route::post('updateGame', [UpdateDataController::class, 'updateGame'])->name('game.update');
Route::post('updateTask1', [UpdateDataController::class, 'updateTask'])->name('task.update');

