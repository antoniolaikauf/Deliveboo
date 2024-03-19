<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRestaurantRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Dish;
use App\Models\User;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dishes = Dish::all();

        return view('dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {


        $data = $request->all();
        $data['available'] = $request->has('available');

        $img = $data['img'];
        $image_path = Storage :: disk('public') -> put('images', $img);

        $newDish = new Dish();

        $newDish->user_id = Auth::id();

        $newDish->name = $data['name'];
        $newDish->description = $data['description'];
        $newDish->price = $data['price'];
        $newDish->available = $data['available'];
        $newDish->img = $image_path;

        $newDish->save();

        return redirect()->route('dish.index', $newDish->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // {
    //     $dish = Dish::find($id);
    //     return view('edit', compact('dish'));
    // }

    {
        $dish = Dish::findOrFail($id);
    
        // Controlla se l'utente autenticato è autorizzato a modificare questo piatto
        if ($dish->user_id !== auth()->id()) {
            // Se l'utente non è autorizzato, puoi gestire la situazione in vari modi,
            // come ad esempio reindirizzarlo a una pagina di errore o mostrarlo un messaggio di errore.
            // Qui, per esempio, reindirizziamo l'utente alla pagina principale con un messaggio di errore.
            return redirect()->route('dish.index')->with('error', 'Non hai i permessi per modificare questo piatto.');
        }
    
        return view('edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantRequest $request, $id)
    {

        $data = $request->all();
        $data['available'] = $request->has('available');
        $dish = Dish::findOrFail($id);


        $dish->user_id = Auth::id();

        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->available = $data['available'];

        // Verifica se l'utente autenticato è autorizzato a modificare questo piatto
    if ($dish->user_id !== auth()->id()) {
        // Se l'utente non è autorizzato, reindirizzalo alla pagina principale con un messaggio di errore
        return redirect()->route('dish.index')->with('error', 'Non hai i permessi per modificare questo piatto.');
    }

        // Verifica se la chiave 'img' esiste nell'array $data
    if ($request->has('img')) {
        // Se la chiave 'img' esiste, gestisci il caricamento dell'immagine
        $img = $data['img'];
        $image_path = Storage::disk('public')->put('images', $img);
    } else {
        // Se la chiave 'img' non esiste, assegna un valore predefinito a $image_path o gestisci diversamente
        $image_path = null; // Ad esempio, puoi impostare $image_path su null o su un percorso predefinito per un'immagine predefinita
    }

        // $img = $data['img'];
        // $image_path = Storage :: disk('public') -> put('images', $img);
        $dish->img = $image_path;


        $dish->save();

        return redirect()->route('dish.index', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();

        return redirect()->route('dish.index');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        $restaurants = Restaurant::all();

        return view('dashboard', compact('restaurants'));
    }
}
