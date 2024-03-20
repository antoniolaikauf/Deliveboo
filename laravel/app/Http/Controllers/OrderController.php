<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
// use App\Models\Restaurant;
// use App\Models\Type;
use App\Models\Dish;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::all();
        $dishes = Dish::all();

        return view('orders', compact('orders','dishes'));
    }

}
