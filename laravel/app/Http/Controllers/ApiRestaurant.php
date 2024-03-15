<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;

class ApiRestaurant extends Controller
{
    public function TypeRestaurants()
    {

        $types = Type::all();

        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'types' => $types,
        ]);
    }
}
