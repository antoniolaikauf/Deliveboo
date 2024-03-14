<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Dish;
use App\Models\User;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dishes = Dish:: all();

        return view ('dish', compact ('dishes'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {


        $data = $request -> all();

        $newDish = new Dish();

        $newDish -> user_id = Auth::id();

        $newDish -> name = $data['name'];
        $newDish -> description = $data['description'];
        $newDish -> price = $data['price'];
        $newDish -> available = $data['available'];

        $newDish -> save();

        return redirect() -> route('dish.index', $newDish -> id);
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
    {
        $dish = Dish::find($id);
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

        $data = $request -> all();
        $dish = Dish::find($id);


        $dish -> user_id = Auth::id();

        $dish -> name = $data['name'];
        $dish -> description = $data['description'];
        $dish -> price = $data['price'];
        $dish->available = $data['available'];

        $dish -> save();

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
        $dish -> delete();

        return redirect() -> route('dish.index');
    }
}
