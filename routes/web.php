<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;


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

Route::get('/', function () {
    return redirect(route('catalogo'));
})->name('welcome');

// ---- API Controller ------

Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'games'], function () {

        Route::get('/', [ApiController::class, 'games'])->name('games');

        Route::get('get/{id}', [ApiController::class, 'gameId'])->name('detalleGame');

        Route::get('platform/{id}', [ApiController::class, 'platformGame'])->name('porPlataforma');
    });

    Route::group(['prefix' => 'platforms'], function () {

        Route::get('/', [ApiController::class, 'platforms'])->name('plataformas');

        Route::get('get/{id}', [ApiController::class, 'platformId'])->name('detallePlataforma');
    });
});


// ----- Auth -----

Route::group(['middleware' => ['auth']], function () {
    // ----- Profile Routes -------
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [UserController::class, 'edit'])->name('perfil'); //muestra tu perfil

        Route::post('/', [UserController::class, 'update'])->name('editarperfil'); // guarda cambios en tu perfil

        Route::get('/delete', [UserController::class, 'destroy'])->name('borrarperfil'); //elimina tu perfil
    });

    // ----- Stocks Routes --------
    Route::group(['prefix' => 'stocks'], function () {

        Route::get('add', [StockController::class, 'create'])->name('nuevoJuego');  //formulario de nuevo juego

        Route::post('add', [StockController::class, 'store'])->name('addJuego'); //añade un nuevo juego --- Proximamente : para hacer esto tenia que filtrar los resultados de la API por nombre etc.

        Route::get('my', [StockController::class, 'my'])->name('misjuegos'); //muestra tus juegos

        Route::get('sell/{id}', [StockController::class, 'sell'])->name('comprar'); //compra un juego

        Route::get('my/{id}', [StockController::class, 'edit'])->name('editarjuego'); //edita un juego

        Route::post('my/{id}', [StockController::class, 'update'])->name('guardarjuego'); // guarda cambios en un juego

        Route::get('/delete/{id}', [StockController::class, 'destroy'])->name('borrarjuego'); //elimina un juego no vendido


    });

    // ----- Sells Routes -------
    Route::group(['prefix' => 'sells'], function () {

        Route::get('/', [SellController::class, 'index'])->name('compras'); //muestra tus compras

        Route::get('{id}', [SellController::class, 'show'])->name('detallesCompra'); //muestra los detalles de una compra tuya
    });

    // ----- Users Routes --------
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [UserController::class, 'index'])->name('usuarios'); //muestra todos los usuarios

        Route::get('/{id}', [UserController::class, 'show'])->name('detallesUsuario');  //muestra detalles de un usuario
    });

    // ----- Messages Routes -------- Proximamente, estaba teniendo problemas para recuperar los mensajes SOLO enviados o recibidos por ese usuario
    Route::group(['prefix' => 'messages'], function () {

        Route::get('/', [MessageController::class, 'index'])->name('mensajes'); //muestra todos tus mensajes

        Route::get('{id}', [MessageController::class, 'show'])->name('conversacion'); //muestra tu conversacion con un usuario

        Route::post('{id}', [MessageController::class, 'store'])->name('nuevoMensaje'); //añade un nuevo mensaje a un usuario
    });
});


// ----- Stocks Routes -------

Route::group(['prefix' => 'stocks'], function () {

    Route::get('/', [StockController::class, 'index'])->name('catalogo'); //muestra los juegos disponibles

    // Route::get('filtro', [StockController::class, 'filtro'])->name('buscando'); //filtra los juegos disponibles PROXIMAMENTE necesito antes filtrar por la API

    Route::get('/{id}', [StockController::class, 'show'])->name('juego'); //muestra los detalles de un juego
});





require __DIR__ . '/auth.php';
