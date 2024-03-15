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

    public function TypesSelected($id)
    {
        $accessories = Type::find($id);
        $types_restaurants = $accessories->restaurants;
        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'risposta' => $types_restaurants,
        ]);
    }
}
