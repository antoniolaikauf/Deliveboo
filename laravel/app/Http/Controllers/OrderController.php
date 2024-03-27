<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
// use App\Models\Restaurant;
// use App\Models\Type;
use App\Models\Dish;
use App\Models\Order;
use Braintree\Gateway;

use App\Http\Requests\OrderRequest;
// commentato
// use Illuminate\Http\Request\OrderRequest;

class OrderController extends Controller
{

    public function index()
    {

        $orders = Order::all();
        // dd($orders);
        $dishes = Dish::all();

        return view('orders', compact('orders', 'dishes'));
    }

    //GRAFICO
    public function showGraph()
    {
        // Recupera l'ID del ristorante dell'utente autenticato
        $restaurantId = auth()->user()->restaurant->id;

        // Recupera i dati dei piatti più ordinati per il ristorante specificato
        $topDishes = Order::whereHas('dishes', function ($query) use ($restaurantId) {
            $query->where('restaurant_id', $restaurantId);
        })
        ->with('dishes')
        ->limit(5)
        ->get();

        //array dei piatti
        $topDishesDetails = [];

        foreach ($topDishes as $order) {
            foreach ($order->dishes as $dish) {
                $name = $dish->name;
                // Quantità del piatto nell'ordine
                $quantity = $dish->pivot->quantity;
                if (isset($topDishesDetails[$name])) {
                    // Aggiorna la quantità
                    $topDishesDetails[$name] += $quantity;
                } else {
                    // Aggiungi il piatto
                    $topDishesDetails[$name] = $quantity;
                }
            }
        }

        // Passa i dati del grafico alla vista
        return view('ordersgraph', compact('topDishesDetails'));
    }
    public function generate(Request $request, Gateway $gateway)
    {
        // genero il clientToken
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        $order = Order::find($request->order);

        $result = $gateway->transaction()->sale([
            'amount' => $order->price,
            // questo token inviato dal frontend
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita!'
            ];
            return response()->json($data, 401);
        }
    }
}
