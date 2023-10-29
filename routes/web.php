<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/site')->name('site.')->group(function(){

     Route::get('/Pedido', [\App\Http\Controllers\SiteController::class, 'index'])->name('pedido.index')->middleware('auth');

     Route::get('/seu-pedido', function(){
        return view('pages.acompanhar-pedido');
     })->name('seu-pedido');
    
});


Route::prefix('/painel')->name('painel.')->group(function(){


    Route::resource('/item', App\Http\Controllers\ItemController::class);

    Route::resource('/cliente', App\Http\Controllers\ClienteController::class);

    Route::resource('/pedido', App\Http\Controllers\PedidoController::class);

    // Route::resource('/pedido-item', App\Http\Controllers\PedidoItemController::class);

    Route::get('pedido-item/create/{pedido}', [App\Http\Controllers\PedidoItemController::class, 'create'])->name('pedido-item.create');
    Route::post('pedido-item/store/{pedido}', [App\Http\Controllers\PedidoItemController::class, 'store'])->name('pedido-item.store');
    Route::get('pedido-item/show/{pedido}', [App\Http\Controllers\PedidoItemController::class, 'show'])->name('pedido-item.show');

    Route::get('/dashboard', function(){
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/clientes', function(){
        return view('pages.cliente.index');
    })->name('clientes');

    Route::get('/itens', function(){
        return view('pages.item.index');
    })->name('itens');

    Route::get('/pedidos', function(){
        return view('pages.pedidos.index');
    })->name('pedidos');
});
