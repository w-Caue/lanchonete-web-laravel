<?php

use App\Http\Controllers\LoginController;
use App\Models\Item;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('site');
});

Route::get('/phpinfo', function () {
    return phpinfo();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/site')->name('site.')->group(function () {

    Route::get('/pedido', [\App\Http\Controllers\SiteController::class, 'index'])->name('pedido.index')->middleware('auth');

    Route::get('/seu-pedido', function () {
        return view('pages.acompanhar-pedido');
    })->name('seu-pedido');
});


Route::middleware('can:painel')->prefix('/painel')->name('painel.')->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/clientes', function () {
        return view('pages.cliente.index');
    })->name('clientes');

    Route::get('/itens', function () {
        return view('pages.item.index');
    })->name('itens');

    Route::get('/pedidos', function () {
        return view('pages.pedidos.index');
    })->name('pedidos');

    Route::get('/relatorios', function () {
        return view('pages.relatorios');
    })->name('relatorios');

    Route::prefix('/relatorio')->name('relatorio.')->group(function (){
        Route::get('/pedidos', function () {
            return view('pages.relatorios.relatorio-pedidos');
        })->name('relatorio-pedidos');
    });

    Route::get('/configuracao', function () {
        return view('pages.configuracao');
    })->name('configuracao');
});
