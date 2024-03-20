<?php

namespace App\Http\Controllers;

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
}
