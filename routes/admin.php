<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\PerguntaListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnidadeEnsinoController;
use App\Http\Controllers\UnidadeListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/tiomonei')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/inicio', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para o registro de usuários
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    // Rotas para atualizar e deletar usuários
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


    // Rotas para operação CRUD de unidade de ensino
    Route::get('/unidade', [UnidadeEnsinoController::class, 'index'])->name('unidade.index');
    Route::post('/unidade', [UnidadeEnsinoController::class, 'store'])->name('unidade.store');
    Route::get('/unidade/{unidade}/edit', [UnidadeListController::class, 'edit'])->name('unidade.edit');
    Route::put('/unidade/{unidade}', [UnidadeListController::class, 'update'])->name('unidade.update');
    Route::delete('/unidades/{unidade}', [UnidadeListController::class, 'destroy'])->name('unidade.destroy');

    //Rotas para as perguntas 
    Route::get('/perguntas', [PerguntaController::class, 'index'])->name('pergunta.index');
    Route::post('/perguntas', [PerguntaController::class, 'store'])->name('pergunta.store');
    Route::get('pergunta/{pergunta}/edit', [PerguntaController::class, 'edit'])->name('pergunta.edit');
    Route::put('/pergunta/{pergunta}', [PerguntaController::class, 'update'])->name('pergunta.update');
    Route::delete('/pergunta/{pergunta}', [PerguntaController::class, 'destroy'])->name('pergunta.destroy');

    //Rotas para o aluno
    Route::get('/aluno', [AlunoController::class, 'mostrarPerguntas'])
        ->name('aluno.index');

    // Rota para salvar as respostas
    Route::post('/aluno', [AlunoController::class, 'salvarRespostas'])
        ->name('aluno.salvar');


    Route::resource('user', UserController::class)->except(['show']);
    Route::resource('list', UnidadeListController::class);
    Route::resource('lista_pergunta', PerguntaListController::class);
});
