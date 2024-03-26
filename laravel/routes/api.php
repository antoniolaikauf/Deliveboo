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
    // chiamata per modificare foto
    route::post('edit/foto', [ApiRestaurant::class, 'EditFoto']);
    // creazione ordine 
    Route::post('/create/order', [ApiRestaurant::class, 'makeorder']);
    // Rotta per la generazione del token
    Route::get('/generate', [OrderController::class, 'generate']);
    // Rotta per la effettuare il pagamento
    Route::post('/makePayment', [OrderController::class, 'makePayment']);
    // prendere ordini
    // Route::get('/order', [ApiRestaurant::class, 'order']);
});
