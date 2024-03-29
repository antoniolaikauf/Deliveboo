<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    // 1 a molti
    public function user(){
        return $this->belongsTo(User::class);
    }

    // molti a molti
    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($dish) {
            $dish->orders()->detach(); // Elimina i record correlati nella tabella pivot
        });
    }
}
