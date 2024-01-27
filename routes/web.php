<?php

use App\Http\Controllers\TodolistController;
use App\Models\Todolist;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [TodolistController::class, function(){return view('login');}]);

Route::get('/', [TodolistController::class, 'index']);
Route::post('/storeTodo', [TodolistController::class, 'storeTodo']);
Route::get('/removeTodo/{id}', [TodolistController::class, 'removeTodo']);
