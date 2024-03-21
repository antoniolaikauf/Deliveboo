<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

use App\Models\Type;
use App\Models\Restaurant;

use App\Models\Order;

use function PHPSTORM_META\type;

class ApiRestaurant extends Controller
{
    public function TypeRestaurants()
    {
        // ottieni tutti i ristoranti e type
        $types = Type::all();
        // ottieni tutti i ristoranti con le loro tabelle gia incorporate 
        $restaurants = Restaurant::with('user.dishes', 'types')->get();

        return response()->json([
            'riuscito' => 'collegamento riuscito',
            'types' => $types,
            'restaurants' => $restaurants,
        ]);
    }

    public function TypesSelected(Request $request)
    {
        // // // Ottieni i tipi selezionati dall'utente e incrementali di 1
        $data = $request->all();
        // dobbiamo aggiungere a tutti gli elementi piu uno essendo che non parte da 0 ma parte da 1 gli id di types
        $data = $request->all();
        $typesRestaurants = array_map(function ($valore) {
            return $valore + 1;
        }, $data);
        $container = [];
        // controllo se array che ti ritorna ha piu di due valori selezionati
        if (count($data) > 1) {

            // prendiamo restaurants con dentro gia i suoi dati delle altre tabelle
            $restaurants = Restaurant::with('user.dishes', 'types')->get();

            // filter itera su tutti gli elementi dentro a $restaurants e i $typesRestaurants sono i valori che deve usare per il controllo
            // il restaurant sarebbe l'elemento singolo di restaurants
            $filteredRestaurants = $restaurants->filter(function ($restaurant) use ($typesRestaurants) {

                // si prendono le relazione che ci sono tra restaurants e types 
                // pluck prende gli id che ci sono nella tabella types relazionati con i restaurant che hanno passato il filter 
                // to array converte una collezione in un array
                $restaurantTypeIds = $restaurant->types->pluck('id')->toArray();
                // array_intersect controlla se ci sono dei valori uguali in questo caso tra i due array quello con dentro solo gli id 
                // che abbiamo fatto con pluck e quello ottenuto dall'utente

                // la condizione  se si toglie il count ritornerà tutti i ristoranti se che hanno gli elementi selezionati 
                // quindi se si mette il count in relazione con quello che ti ritorna array_intersect e con array dei elementi selezionati 
                // non ti ritorna i ristoranti con un elemento 

                return count(array_intersect($typesRestaurants, $restaurantTypeIds)) === count($typesRestaurants);
            });

            // When casting to value objects, any changes made to the value object will automatically
            //  be synced back to the model before the model is saved:
            // tutti i cambiamenti vengono resettati con values e dopo salvati in un array 
            $filteredRestaurantsArray = $filteredRestaurants->values()->toArray();


            // array pushato dento ad un altro array
            array_push($container, $filteredRestaurantsArray);
        } else {
            // se c'è uno solo lo trova con find e da quello lo prende e lo mette in container con dentro gia tutte le sue relazioni con altre tabelle

            foreach ($typesRestaurants as $tipeid) {
                $type = Type::find($tipeid);

                $restaurant = $type->restaurants()->with('user.dishes')->get();
                array_push($container, $restaurant);
            }
        }
        // return per fron-end
        return response()->json([
            'risposta' => $container,
        ]);
    }
    public function EditFoto(Request $request)
    {
        $data = $request->input('data'); // Accedi direttamente al valore 'data' inviato dall'frontend

        $imguploated = "http://localhost:8000/storage/" . $data;

        return response()->json([
            'risposta' => $imguploated,
        ]);
    }

    public function order(Request $request)
    {
        // prendi tutti gli ordini
        $dishes = order::all();

        return response()->json([
            'ordine' => $dishes,
        ]);
    }

    public function makeorder(Request $request)
    {

        $data = $request->all();

        // $order = new Order();
        // $order->address = $data['indirizzo'];
        // $order->payment = $data['selezione'];
        // $order->price = $data['price'];
        // $order->date = $data['data'];
        // $order->name_customer = $data['name'];
        // $order->phone_number = $data['numero'];
        // $order->email_customer = $data['email'];

        // $dishes = $data['dishes'];
        // $order->save();

        // foreach ($dishes as $dishData) {
        //     $dish = Dish::find($dishData['id']);
        //     if ($dish) {
        //         $order->dishes()->attach($dish, ['quantity' => $dishData['quantity']]);
        //     }
        // }


        return response()->json(['message' => 'unziono'], 200);
    }
}
