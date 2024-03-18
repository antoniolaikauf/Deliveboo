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
        // QUA SE SI VUOLE VEDERE TUTTI I RISTORANTI NEL RONT END TOGLIERE COMMENTI 
        // $restaurants = Restaurant::all();


        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'types' => $types,
            // QUA SE SI VUOLE VEDERE TUTTI I RISTORANTI NEL RONT END TOGLIERE COMMENTI 
            // 'restaurants' => $restaurants,
        ]);
    }

    public function TypesSelected(Request $request)
    {
        // Ottieni i tipi selezionati dall'utente
        $data = $request->all();
        $container = [];

        foreach ($data as $typeId) {
            $type = Type::find($typeId);

            // Verifica se il tipo esiste prima di procedere
            if ($type) {
                $restaurants = $type->restaurants()->with('user.dishes')->get();
                $container[] = $restaurants;
            }
        }

        return response()->json([
            'risposta' => $container,
        ]);
    }
}
