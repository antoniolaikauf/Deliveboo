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

    //recupero tutti gli utenti
    $users = User::all();

    $dishes = [
        // Primi piatti
        [

            'name' => 'Spaghetti alla Carbonara',
            'description' => 'Spaghetti conditi con uova, pancetta e pecorino romano.',
            'img'=>'https://images.pexels.com/photos/6223191/pexels-photo-6223191.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'available' => true,
            'price' => 9.50,
        ],
        [

            'name' => 'Risotto ai Funghi Porcini',
            'description' => 'Risotto con funghi porcini freschi e prelibato brodo di carne.',
            'img'=>'https://images.pexels.com/photos/6406460/pexels-photo-6406460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'available' => true,
            'price' => 12.00,
        ],
        [

            'name' => 'Spaghetti di Soia con Verdure',
            'description' => 'Spaghetti di soia saltati in padella con verdure fresche e salsa di soia.',
            'img'=>'https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2022/08/Spaghetti-di-soia-0D6A4681.jpg',
            'available' => true,
            'price' => 10.00,
        ],

        // Antipasti
        [

            'name' => 'Bruschetta al Pomodoro',
            'description' => 'Fette di pane tostate condite con pomodoro fresco, aglio, basilico e olio extra vergine di oliva.',
            'img'=>'https://static.fanpage.it/wp-content/uploads/sites/21/2019/03/bruschetta-pomodoro.jpg',
            'available' => true,
            'price' => 6.00,
        ],
        [

            'name' => 'Involtini Primavera',
            'description' => 'Involtini di verdure avvolti in pasta croccante e fritti, serviti con salsa agrodolce.',
            'img'=>'https://static.fanpage.it/wp-content/uploads/sites/21/2022/04/involtini-primavera.jpg',
            'available' => true,
            'price' => 8.50,
        ],
        [

            'name' => 'Carpaccio di Manzo',
            'description' => 'Fettine di manzo crudo condite con olio, limone, rucola e scaglie di parmigiano.',
            'img'=>'https://www.deabyday.tv/.imaging/default/article/articles/food/classifiche/Carpaccio-di-manzo--5-ricette-da-provare/imageOriginal.jpg',
            'available' => true,
            'price' => 10.00,
        ],

        // Secondi piatti
        [

            'name' => 'Hamburger Classico',
            'description' => 'Hamburger con manzo, lattuga, pomodoro e maionese.',
            'img'=>'https://www.omahasteaks.com/blog/wp-content/uploads/2020/04/bg190-classic-american-burger-B-1080x610.png',
            'available' => true,
            'price' => 14.00,
        ],
        [

            'name' => 'Sushi Misto',
            'description' => 'Assortimento di sushi con varie tipologie di pesce.',
            'img'=>'https://www.sushimilegnano.it/wp-content/uploads/2016/11/Sushi-Sashimi-misto-grande-1.jpg',
            'available' => true,
            'price' => 18.00,
        ],
        [

            'name' => 'Pollo alla Cacciatora',
            'description' => 'Pollo cotto lentamente con pomodoro, cipolla, olive, vino bianco e aromi.',
            'img'=>'https://statics.cucchiaio.it/content/cucchiaio/it/ricette/2009/12/ricetta-pollo-cacciatora/jcr:content/header-par/image_single.img10.jpg/1429534872166.jpg',
            'available' => true,
            'price' => 13.50,
        ],
        // Dolci
        [

            'name' => 'Tiramisù',
            'description' => 'Delizioso dolce al caffè con savoiardi e mascarpone.',
            'img'=>'https://www.galbani.fr/wp-content/uploads/2018/10/mon-tiramisu.jpg',
            'available' => true,
            'price' => 7.00,
        ],
        [

            'name' => 'Panna Cotta',
            'description' => 'Dolce al cucchiaio con panna, zucchero, gelatina e vaniglia.',
            'img'=>'https://merryboosters.com/wp-content/uploads/2021/03/panna-cotta-1024x576.png',
            'available' => true,
            'price' => 6.50,
        ],
        [

            'name' => 'Torta di Mele',
            'description' => 'Torta tradizionale preparata con mele fresche, cannella e zucchero.',
            'img'=>'https://cdn.ilclubdellericette.it/wp-content/uploads/2017/12/torta-di-mele-soffice.jpg',
            'available' => true,
            'price' => 6.00,
        ],

        // Bevande
        [

            'name' => 'Acqua Naturale',
            'description' => 'Acqua minerale naturale in bottiglia.',
            'img'=>'https://www.valevend-shop.it/1084-thickbox_default/acqua-naturale-levissima-in-bottiglietta-pet-50-cl-confezione-da-24-pezzi.jpg',
            'available' => true,
            'price' => 2.00,
        ],
        [

            'name' => 'Vino Rosso',
            'description' => 'Vino rosso di qualità selezionata.',
            'img'=>'https://laspesaonline.eurospin.it/photo/2023/01/05/22/main/large/10726401-11434201-20230101000434.jpg',
            'available' => true,
            'price' => 15.00,
        ],
        [

            'name' => 'Caffè Espresso',
            'description' => 'Caffè espresso fatto con chicchi di caffè di alta qualità.',
            'img'=>'https://www.lux-review.com/wp-content/uploads/2021/04/Espresso.jpg',
            'available' => true,
            'price' => 2.50,
        ],


    ];

         // itero attraverso ogni utente recuperato dal database
        foreach ($users as $user) {

            // ottengo l'elenco degli ID dei piatti già assegnati all'utente corrente
            $assignedDishesIds = $user->dishes->pluck('id')->toArray(); //*1

            // calcolo il numero massimo di piatti casuali da selezionare per l'utente corrente
            $maxRandomDishes = min(10, count($dishes) - count($assignedDishesIds));

            // ottengo un array di chiavi dei piatti non ancora assegnati all'utente corrente
            $randomDishesKeys = array_diff(array_keys($dishes), $assignedDishesIds); //*2

            // seleziono casualmente le chiavi dei piatti da assegnare all'utente corrente
            $randomDishesKeys = array_rand($randomDishesKeys, $maxRandomDishes);

             // itero attraverso ogni chiave selezionata casualmente
            foreach ($randomDishesKeys as $index) {

                // ottengo i dati del piatto corrispondente alla chiave
                $dishData = $dishes[$index];

                // creo un nuovo oggetto Dish utilizzando i dati del piatto
                $dish = new Dish($dishData);

                // associo l'utente corrente al piatto
                $dish->user()->associate($user);

                // salvo il piatto nel database
                $dish->save();
            }
        }
    }
}

//*1 La funzione pluck('id') è un metodo di Laravel che viene chiamato su una collezione di oggetti eloquent,
//come ad esempio una collezione di utenti.
//Questo metodo estrae il valore dell'attributo 'id' per ogni oggetto nella collezione
//e restituisce un array contenente tutti questi valori di ID.

//*2 array_keys($dishes): Restituisce un array contenente le
//chiavi dell'array $dishes, cioè gli indici numerici o le chiavi associative dei piatti.
//La funzione array_diff confronta due array e restituisce un array contenente
//tutti gli elementi presenti nel primo array che non sono presenti nel secondo array.
