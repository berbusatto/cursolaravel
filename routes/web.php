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


// SINTAXE DAS ROTAS ANTES DO AGRUPAMENTO(PREFIX, NAME, CONTROLLER)
// Route::get('/users', [UserController::class, 'index'])->name('user.index');


// ROTA PARA IMPLEMENTAR UM IMPLICIT BIND COM INJEÇÃO DE DEPENDENCIA NO MÉTODO SHOW
// BUSCANDO PELO EMAIL. POR PADRÃO {/user} ELE BUSCA POR ID
// DUPLICADA!!  REPETE ABAIXO DENTRO DO GROUP
// Route::get('/users/{user:email}', [UserController::class, 'show'])->name('user.show');

Route::prefix('users')
    ->name('user.')
    ->controller(UserController::class)
    ->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/add','create')->name('create');
        Route::get('/{user}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/add', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete{id}', 'destroy')->name('destroy');
});


