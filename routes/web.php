<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [TodoController::class, 'index'])->name('todo');
Route::post('/todo/store', [TodoController::class, 'store'])->name('todo_save');
Route::put('/todo/update/{id}', [TodoController::class, 'update'])->name('todo_update');
Route::delete('/todo/delete/{id}', [TodoController::class, 'destroy'])->name('todo_delete');
