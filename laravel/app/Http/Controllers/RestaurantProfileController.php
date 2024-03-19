<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantProfileController extends Controller
{
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $type = Type:: all();
        return view('edit', compact('restaurant','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();


        $restaurant = Restaurant::find($id);

        $restaurant->user_id = Auth::id();
        $restaurant->name = $data['nome_ristorante'];
        $restaurant->city = $data['city'];
        $restaurant->piva = $data['piva'];

        $img = $data['img'];
        $image_path = Storage :: disk('public') -> put('images', $img);
        $restaurant->img = $image_path;

        $restaurant->save();

        $restaurant->types()->attach($request->input('types'));


        return redirect()->route('profile.edit', $restaurant->id);
    }
}
