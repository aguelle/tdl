<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index'])->name('home');

Route::get('/done', [TaskController::class, 'done'])
->name('task.done');

Route::get('/form', [TaskController::class, 'create'])->name('task.add');

Route::get('/finished/{id}', [TaskController::class, 'finish'])
    ->where(['id', '[0-9]+'])
    ->name('task.finished');

    Route::get('/unfinished/{id}', [TaskController::class, 'unfinish'])
    ->where(['id', '[0-9]+'])
    ->name('task.unfinished');

Route::get('/delete/{id}', [TaskController::class, 'destroy'])
    ->where(['id', '[0-9]+'])
    ->name('task.delete');

Route::get('/edit/{id}', [TaskController::class, 'edit'])
    ->where(['id', '[0-9]+'])
    ->name('task.edit');

Route::get('/up/{id}', [TaskController::class, 'up'])
    ->where(['id', '[0-9]+'])
    ->name('task.up');

Route::get('/down/{id}', [TaskController::class, 'down'])
    ->where(['id', '[0-9]+'])
    ->name('task.down');

Route::get('/reminder/{id}', [TaskController::class, 'editreminder'])
    ->where(['id', '[0-9]+'])
    ->name('task.editreminder');

Route::post('/reminder/{id}', [TaskController::class, 'reminder'])
    ->where(['id', '[0-9]+'])
    ->name('task.reminder');

Route::post('/update/{id}', [TaskController::class, 'update'])
    ->where(['id', '[0-9]+'])
    ->name('task.update');

//send form 
Route::post('/task-insert', [TaskController::class, 'store'])->name('task.insert');
