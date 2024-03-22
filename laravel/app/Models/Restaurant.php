<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    //molti a molti
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    //1 a 1 (vedi user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // restaurant ha molti ordini 
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
