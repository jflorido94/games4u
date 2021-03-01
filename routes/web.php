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
    return view('welcome');
});

// ---- API Controller ------

Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'games'], function () {

        Route::get('/', [ApiController::class, 'games']);

        Route::get('get/{id}', [ApiController::class, 'gameId']);

        Route::get('platform/{id}', [ApiController::class, 'platformGame']);

    });

    Route::group(['prefix' => 'platforms'], function () {

        Route::get('/', [ApiController::class, 'platforms']);

        Route::get('get/{id}', [ApiController::class, 'platformId']);


    });
});

// ----- Stocks Controller -------

Route::group(['prefix' => 'stocks'], function () {

    Route::get('/', [StockController::class, 'index']);

    Route::get('filtro', [StockController::class, 'filtro']);
});




// ----- Auth -----

Route::group(['middleware' => ['auth']], function () {

    // ----- Sells Controller -------
    Route::group(['prefix' => 'sells'], function () {

        Route::get('/', [SellController::class, 'index']);

        Route::get('{id}', [SellController::class, 'games']);
    });

    // ----- Messages Controller --------
    Route::group(['prefix' => 'messages'], function () {

        Route::get('/', [MessageController::class, 'games']);

        Route::get('{id}', [MessageController::class, 'games']);
    });


});
Route::group(['prefix' => 'users'], function () {

    Route::get('/', [UserController::class, 'index']);

    Route::get('/{id}', [UserController::class, 'index']);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
