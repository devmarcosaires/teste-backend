<?php

use App\Http\Controllers\ProdutorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\VinculosController;

// Rota inicial (página de login)
Route::get('/', function () {
    return view('auth.login');
});

// Rotas de autenticação geradas pelo Laravel
Auth::routes();

// Rota para a tela home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas para Produtores
Route::get('/produtores', [ProdutorController::class, 'index'])->name('produtores.index');
Route::get('/produtores/create', [ProdutorController::class, 'create'])->name('produtores.create');
Route::post('/produtores', [ProdutorController::class, 'store'])->name('produtores.store');
Route::get('/produtores/{id}', [ProdutorController::class, 'show'])->name('produtores.show');
Route::get('/produtores/{id}/edit', [ProdutorController::class, 'edit'])->name('produtores.edit');
Route::put('/produtores/{id}', [ProdutorController::class, 'update'])->name('produtores.update');
Route::delete('/produtores/{id}', [ProdutorController::class, 'destroy'])->name('produtores.destroy');

// Rotas para Propriedades
Route::get('/propriedades', [PropriedadeController::class, 'index'])->name('propriedades.index');
Route::get('/propriedades/create', [PropriedadeController::class, 'create'])->name('propriedades.create');
Route::post('/propriedades', [PropriedadeController::class, 'store'])->name('propriedades.store');
Route::get('/propriedades/{propriedade}', [PropriedadeController::class, 'show'])->name('propriedades.show');
Route::get('/propriedades/{id}/edit', [PropriedadeController::class, 'edit'])->name('propriedades.edit');
Route::put('/propriedades/{id}', [PropriedadeController::class, 'update'])->name('propriedades.update');
Route::delete('/propriedades/{id}', [PropriedadeController::class, 'destroy'])->name('propriedades.destroy');

// GET em '/propriedades/search' executa a função 'search' do controlador 'PropriedadeController'
Route::get('/propriedades/search', [PropriedadeController::class, 'search'])->name('propriedades.search');

// Rota resource propriedades 
Route::resource('propriedades', PropriedadeController::class)->except([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);
