<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;

use App\Models\Restaurant;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Genera i tipi
        $types = [
            ['name' => 'Vegetariano'],
            ['name' => 'Mediterraneo'],
            ['name' => 'Asiatico'],
            ['name' => 'Fast-food'],
            ['name' => 'Fushion'],
            ['name' => 'Vegano'],
        ];
        // ciclo per creazione dei type 
        foreach ($types as $typeData) {
            $type = Type::create($typeData);
        }

        // Associa un tipo casuale a ciascun ristorante
        // ottenere tutti i restaurant nel tabella database
        $restaurants = Restaurant::all();
        // ciclo per associare ogni restaurant ad un type
        foreach ($restaurants as $restaurant) {
            // associamo ogni retaurant ad uno o piu type
            $randomType = Type::inRandomOrder()->limit(rand(1, 2))->get();
            $restaurant->types()->attach($randomType);
        }
    }
}
