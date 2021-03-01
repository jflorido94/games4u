<?php

use App\Http\Controllers\ApiController;
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

Route::get('/', function () {
    return view('welcome');
});

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


Route::group(['prefix' => 'stocks'], function () {

    Route::get('/', function () {
        return "stocks/";
    });

    Route::get('/filtro', function () {
        return "stocks/filtro";
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'sells'], function () {
        Route::get('/', function () {
            return "sells/";
        });
        Route::get('/{id}', function ($id) {
            return "sells/{{$id}}";
        });
    });

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', function () {
            return "messages/";
        });
        Route::get('/{id}', function ($id) {
            return "messages/{{$id}}";
        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
