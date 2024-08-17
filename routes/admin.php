<?php

use App\Http\Controllers\ComboControlle;
use App\Http\Controllers\EncarteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PessoalController;
use App\Http\Controllers\ProdutoController;
use App\Livewire\Admin\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->group(function () {

    Route::get('/login', Login::class)->name('login');

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::prefix('/pessoal')->name('pessoal.')->group(function () {
        Route::get('/', function () {
            return view('pages.pessoal.index');
        })->name('index');

        Route::get('/{codigo}', [PessoalController::class, 'show'])->name('show');
    });

    Route::prefix('/produto')->name('produto.')->group(function () {
        Route::get('/', function () {
            return view('pages.produtos.index');
        })->name('index');


        Route::prefix('/encarte')->name('encarte.')->group(function () {
            Route::get('/', function () {
                return view('pages.encarte.index');
            })->name('index');

            Route::get('/{codigo}', [EncarteController::class, 'show'])->name('show');
        });

        Route::prefix('/combos')->name('combos.')->group(function () {
            Route::get('/', function () {
                return view('pages.combos.index');
            })->name('index');

            Route::get('/{codigo}', [ComboControlle::class, 'show'])->name('show');
        });

        Route::get('/{codigo}', [ProdutoController::class, 'show'])->name('show');
    });

    Route::prefix('/pedido')->name('pedido.')->group(function () {
        Route::get('/', function () {
            return view('pages.pedidos.index');
        })->name('index');

        Route::get('/{codigo}', [PedidoController::class, 'show'])->name('show');
    });

    Route::prefix('/configuracao')->name('configuracao.')->group(function () {
        Route::get('/', function () {
            return view('pages.configuracao.index');
        })->name('index');

        Route::get('/usuarios', function () {
            return view('pages.configuracao.users.index');
        })->name('users');
    });
});
