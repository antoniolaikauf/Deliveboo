<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Http\Request\OrderRequest;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        // genero il clientToken 
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];
        
        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway){

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        if($result->success){
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success' => true,
                'message' => 'Transazione fallita!'
            ];
            return response()->json($data,401);
        }
    }
=======
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
// use App\Models\Restaurant;
// use App\Models\Type;
use App\Models\Dish;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::all();
        $dishes = Dish::all();

        return view('orders', compact('orders','dishes'));
    }

>>>>>>> 2034313f596b9705403a1a15b5a956da77818336
}
