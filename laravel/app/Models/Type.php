<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    //1 a molti
    public function restaurants(){
        return $this->belongsToMany(Restaurant::class);
    }
}
