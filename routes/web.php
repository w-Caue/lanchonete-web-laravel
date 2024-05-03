<?php

use App\Http\Controllers\ComboControlle;
use App\Http\Controllers\EncarteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PessoalController;
use App\Http\Controllers\ProdutoController;
use App\Models\Item;
use App\Models\Pedido;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

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

    Route::get('/finalizar', function () {
        return view('ecommerce.finalizar');
    })->name('finalizar');
});

Route::prefix('/admin')->name('admin.')->group(function () {

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
});

// Route::middleware('can:painel')->prefix('/painel')->name('painel.')->group(function () {


//     Route::get('/dashboard', function () {
//         return view('pages.dashboard');
//     })->name('dashboard');

//     Route::get('/clientes', function () {
//         return view('pages.cliente.index');
//     })->name('clientes');

//     Route::get('/itens', function () {
//         return view('pages.item.index');
//     })->name('itens');

//     Route::get('/pedidos', function () {
//         return view('pages.pedidos.index');
//     })->name('pedidos');
// });

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
