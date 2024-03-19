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
        $restaurants = Restaurant::with('user.dishes')->get();


        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'types' => $types,
            // QUA SE SI VUOLE VEDERE TUTTI I RISTORANTI NEL RONT END TOGLIERE COMMENTI 
            'restaurants' => $restaurants,
        ]);
    }

    public function TypesSelected(Request $request)
    {
        // Ottieni i tipi selezionati dall'utente
        $data = $request->all();
        $container = [];

        foreach ($data as $typeId) {
            $type = Type::find($typeId + 1);

            // Verifica se il tipo esiste prima di procedere
            if ($type) {
                // Stai utilizzando la relazione tra restaurants e user per caricare i dati degli utenti associati a ciascun ristorante, 
                // e quindi utilizzi with('user.dishes') per caricare anche i dati dei piatti associati a ciascun utente.
                $restaurants = $type->restaurants()->with('user.dishes')->get();

                // Stai tentando di utilizzare il metodo with() direttamente su una collezione di ristoranti ($type->restaurants)
                //  anziché sulla relazione
                //  stessa. Il problema qui è che $type->restaurants restituisce una collezione di ristoranti, e non la relazione stessa
                // $accessories = Type::find($data[$i]);
                // $types_restaurants = $accessories->restaurants;
                // $restaurants = $type->restaurants->user->with('dishes')->get();
                $container[] = $restaurants;
            }
        }

        return response()->json([
            'risposta' => $container,
        ]);
    }
}
