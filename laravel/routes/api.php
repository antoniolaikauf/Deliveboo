<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiRestaurant;

use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
    // chiamata per ottenere i type
    route::get('types', [ApiRestaurant::class, 'TypeRestaurants']);
    // chiamata per ottenere i ristoranti 
    route::post('types/select', [ApiRestaurant::class, 'TypesSelected']);

    route::post('edit/foto', [ApiRestaurant::class, 'EditFoto']);

    // Rotta per la generazione del token
    Route::get('/generate', [OrderController::class, 'generate']);
    // Rotta per la vendita
    Route::post('/makePayment', [OrderController::class, 'makePayment']);

    // prendere ordini 
    Route::get('/order', [ApiRestaurant::class, 'order']);
});
