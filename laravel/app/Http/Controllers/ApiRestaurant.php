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

        $types = Type::all();
        $restaurants = Restaurant::all();


        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'types' => $types,
            'restaurants' => $restaurants,
        ]);
    }

    public function TypesSelected(Request $request)
    {
        $data = $request->all();
        $container = [];
        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = $data[$i] + 1;
            $accessories = Type::find($data[$i]);
            $types_restaurants = $accessories->restaurants;
            array_push($container, $types_restaurants);
        }
        return response()->json([
            'risposta' => $container,
        ]);
    }

}
