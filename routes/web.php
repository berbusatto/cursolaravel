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
// BUSCANDO PELO EMAIL. POR PADRÃO {/user} ELE BUSCA POR ID.
// DUPLICADA!!  REPETE ABAIXO DENTRO DO GROUP
// Route::get('/users/{user:email}', [UserController::class, 'show'])->name('user.show');

//Route::prefix('users')
//    ->name('user.')
//    ->controller(UserController::class)
//    ->group(function (){
//
//        // INSERIR TODAS AS ROTAS DO GRUPO
//        Route::get('/', 'index')->name('index');
//
//        Route::get('/{user}', 'show')
//        // MÉTODO MISSING PARA QUANDO A ROTA NÃO FOR ENCONTRADA
//        // NÃO É NECESSÁRIO INJETAR A REQUEST, APENAS SE QUISER ACESSAR ALGUM DADO
//            ->missing(function (\Illuminate\Http\Request $request){
//                return redirect()->route('user.index');
//            })->name('show');
//
//        Route::get('/add','create')->name('create');
//        Route::get('/edit/{id}', 'edit')->name('edit');
//        Route::post('/add', 'store')->name('store');
//        Route::put('/update/{id}', 'update')->name('update');
//        Route::delete('/delete{id}', 'destroy')->name('destroy');
//});



// ROTAS RESOURCE - SUBSTITUI TODAS AS DECLARAÇÕES DE ROTA EM APENAS UMA,
// CONCATENANDO O NOME DA ROTA COM A FUNÇÃO NO CONTROLLER

Route::resource('/user', UserController::class)->names([
    'index' => 'user.index',
    'show' => 'user.show',
    'edit' => 'user.edit',
    'create' => 'user.create',
    'destroy' => 'user.destroy',
    'update' => 'user.update',
    'store' => 'user.store'
]);

// CONTROLANDO AS ROTAS DISPONÍVEIS ->only E ->except()
// PARA TESTAR, RODAR NO TERMINAL
// php artisan route:list --except-vendor
//Route::resource('/user', UserController::class)->only([
//    'index',
//    'show'
//]);

// MÉTODO FALLBACK
// DEFINE UMA PÁGINA PADRÃO PARA QUANDO A ROTA NÃO É ENCONTRADA
// O IDEAL É RETORNAR UMA BLADE DE 404
Route::fallback(function (){
    return redirect()->route('user.index');
});




