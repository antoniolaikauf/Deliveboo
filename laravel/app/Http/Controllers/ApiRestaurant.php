<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;
use App\Models\Restaurant;

use function PHPSTORM_META\type;

class ApiRestaurant extends Controller
{
    public function TypeRestaurants()
    {
        // ottieni tutti i ristoranti e type
        $types = Type::all();
        // $restaurants = Restaurant::all();


        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'types' => $types,
            // 'restaurants' => $restaurants,
        ]);
    }

    
    
    public function TypesSelected(Request $request)
    {
        $restaurants = Restaurant::all();

        // ottieni i ristoranti selezionati dall'utente
        $data = $request->all();
        $container = [];
        
        if ($restaurants>30) {
                
            for ($i=0; $i==$restaurants-30; $i++) {
                    path assegno img_1
                }
            }
        }

        // trova tutti i ristoratori e li associa con le types 
        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = $data[$i] + 1;
            $accessories = Type::find($data[$i]);
            $types_restaurants = $accessories->restaurants;
            array_push($container, $types_restaurants);
        }
        return response()->json([
            'risposta' => $container,
            'pathnew' =>
        ]);
    }
}
