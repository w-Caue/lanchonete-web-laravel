<?php

use App\Http\Controllers\ComboControlle;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\EncarteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PessoalController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

//Routes Admin
require_once "admin.php";

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::prefix('/suaempresa')->name('ecommerce.')->group(function () {

    Route::prefix('/conta')->name('conta.')->group(function () {
        Route::get('/meu-cadastro', function () {
            return view('ecommerce.conta.cadastro');
        })->name('cadastro');

        Route::get('/meus-pedidos', function () {
            return view('ecommerce.conta.pedidos');
        })->name('pedidos');
    });

    Route::get('/cardapio', function () {
        return view('ecommerce.cardapio');
    })->name('produtos');

    Route::get('/produto/{codigo}', [EcommerceController::class, 'produto'])->name('produto-detalhe');

    Route::get('/carrinho', function () {
        return view('ecommerce.carrinho');
    })->name('carrinho');

    Route::get('/cliente', function () {
        return view('ecommerce.pessoa');
    })->name('cliente');

    Route::get('/localizacao', function () {
        return view('ecommerce.endereco');
    })->name('localizacao');

    Route::get('/pagamento', function () {
        return view('ecommerce.pagamento');
    })->name('pagamento');

    Route::get('/pedido', function () {
        return view('ecommerce.pedido');
    })->name('pedido');

    Route::get('/finalizar/{codigo}', [EcommerceController::class, 'finalizar'])->name('finalizar');
});

Route::get('/limpar', function () {
    try {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('clear-compiled');
        Artisan::call('config:cache');
        Artisan::call('config:clear');


        session()->remove('carrinho');
        session()->remove('cliente');
        session()->remove('localizacao');
        session()->remove('pagamento');

        echo "Foi limpo meu patrão";
    } catch (Exception $e) {
        return response()->make($e->getMessage(), 500);
    }
});
