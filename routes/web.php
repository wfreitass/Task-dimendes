<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::controller(TaskController::class)->group(function () {
    // Route::get('/prompts', 'index')->name('prompts');
    // Route::get('/prompts', 'getAll')->name('prompts');
    // Route::get('/prompts/{id}', 'getById')->name('prompt');
    Route::get('/tasks', 'index')->name('tasks');
    Route::get('/tasks/create', 'create')->name('task-create');
    Route::post('/tasks/store', 'store')->name('task-store');
});
