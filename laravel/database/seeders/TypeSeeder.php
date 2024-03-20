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
            [
                'name' => 'Vegetariano',
                'img' => 'https://www.develey.it/wp-content/uploads/2018/12/shutterstock_623007527.jpg'
            ],
            [
                'name' => 'Mediterraneo',
                'img' => 'https://master-7rqtwti-znj23gdadsstc.piximizer.px.at/maxw_978,q_80,f_inside,v_3831872a07/fileadmin/amc.info/6-Blog/it-it/Article_13_Mediterranean_food_healthy.jpg'
            ],
            [
                'name' => 'Asiatico',
                'img' => 'https://c8.alamy.com/compit/jgkbyf/cibo-asiatico-tabella-con-vari-tipi-di-cucina-cinese-e-tagliatelle-pollo-maiale-manzo-minestra-acida-riso-involtini-primavera-sushi-gamberi-e-molti-altri-servita-jgkbyf.jpg'
            ],
            [
                'name' => 'Fast-food',
                'img' => 'https://lavaligiagialla.it/wp-content/uploads/2022/02/usa-cibo-1024x512.png?x81396'
            ],
            [
                'name' => 'Fushion',
                'img' => 'https://www.ororossomilano.com/wp-content/uploads/riso-cucina-fusion.jpg'
            ],
            [
                'name' => 'Vegano',
                'img' => 'https://www.francescofavorito.it/wp-content/uploads/2016/01/mille-colori-cibo.jpg'
            ],
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
