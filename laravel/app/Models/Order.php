<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //molti a molti
    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
    // gli ordini appartengono ad un ristorante
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
