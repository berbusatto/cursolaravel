<?php

use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id?}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/delete{id}', [UserController::class, 'destroy'])->name('user.destroy');
