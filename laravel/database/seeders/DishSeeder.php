<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dish;
use App\Models\User;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            // Primi piatti
            [
                'id' => 1,
                'name' => 'Spaghetti alla Carbonara',
                'description' => 'Spaghetti conditi con uova, pancetta e pecorino romano.',
                'available' => true,
                'price' => 9.50,
            ],
            [
                'id' => 2,
                'name' => 'Risotto ai Funghi Porcini',
                'description' => 'Risotto con funghi porcini freschi e prelibato brodo di carne.',
                'available' => true,
                'price' => 12.00,
            ],
            [
                'id' => 3,
                'name' => 'Spaghetti di Soia con Verdure',
                'description' => 'Spaghetti di soia saltati in padella con verdure fresche e salsa di soia.',
                'available' => true,
                'price' => 10.00,
            ],

            // Antipasti
            [
                'id' => 4,
                'name' => 'Bruschetta al Pomodoro',
                'description' => 'Fette di pane tostate condite con pomodoro fresco, aglio, basilico e olio extra vergine di oliva.',
                'available' => true,
                'price' => 6.00,
            ],
            [
                'id' => 5,
                'name' => 'Involtini Primavera',
                'description' => 'Involtini di verdure avvolti in pasta croccante e fritti, serviti con salsa agrodolce.',
                'available' => true,
                'price' => 8.50,
            ],
            [
                'id' => 6,
                'name' => 'Carpaccio di Manzo',
                'description' => 'Fettine di manzo crudo condite con olio, limone, rucola e scaglie di parmigiano.',
                'available' => true,
                'price' => 10.00,
            ],

            // Secondi piatti
            [
                'id' => 7,
                'name' => 'Hamburger Classico',
                'description' => 'Hamburger con manzo, lattuga, pomodoro e maionese.',
                'available' => true,
                'price' => 14.00,
            ],
            [
                'id' => 8,
                'name' => 'Sushi Misto',
                'description' => 'Assortimento di sushi con varie tipologie di pesce.',
                'available' => true,
                'price' => 18.00,
            ],
            [
                'id' => 9,
                'name' => 'Pollo alla Cacciatora',
                'description' => 'Pollo cotto lentamente con pomodoro, cipolla, olive, vino bianco e aromi.',
                'available' => true,
                'price' => 13.50,
            ],

            // Dolci
            [
                'id' => 10,
                'name' => 'Tiramisù',
                'description' => 'Delizioso dolce al caffè con savoiardi e mascarpone.',
                'available' => true,
                'price' => 7.00,
            ],
            [
                'id' => 11,
                'name' => 'Panna Cotta',
                'description' => 'Dolce al cucchiaio con panna, zucchero, gelatina e vaniglia.',
                'available' => true,
                'price' => 6.50,
            ],
            [
                'id' => 12,
                'name' => 'Torta di Mele',
                'description' => 'Torta tradizionale preparata con mele fresche, cannella e zucchero.',
                'available' => true,
                'price' => 6.00,
            ],

            // Bevande
            [
                'id' => 13,
                'name' => 'Acqua Naturale',
                'description' => 'Acqua minerale naturale in bottiglia.',
                'available' => true,
                'price' => 2.00,
            ],
            [
                'id' => 14,
                'name' => 'Vino Rosso',
                'description' => 'Vino rosso di qualità selezionata.',
                'available' => true,
                'price' => 15.00,
            ],
            [
                'id' => 15,
                'name' => 'Caffè Espresso',
                'description' => 'Caffè espresso fatto con chicchi di caffè di alta qualità.',
                'available' => true,
                'price' => 2.50,
            ],
        ];
        foreach ($dishes as $dishData) {
            $dish = Dish::make($dishData);
            $randomUser = User::inRandomOrder()->first();
            $dish->user()->associate($randomUser);

            $dish->save();
        }
    }
}
