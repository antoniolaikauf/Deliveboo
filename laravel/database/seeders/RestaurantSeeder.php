<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;

use App\Models\Type;

use App\Models\User;
use Illuminate\Validation\Rules\Unique;

use function PHPSTORM_META\type;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = Type::all();
        $restaurants = [
            [
                'name' => 'Al Dente Trattoria',
                'city' => 'Bergamo',
                'piva' => '01234567890',
                'img' => 'https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Ristorante Crack',
                'city' => 'Gubbio',
                'piva' => '12345678901',
                'img' => 'https://images.pexels.com/photos/11794317/pexels-photo-11794317.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 2,
                'user_id' => 2,
            ],
            [
                'name' => 'La Trattoria del Nonno',
                'city' => 'Grottaglie',
                'piva' => '23456789012',
                'img' => 'https://images.pexels.com/photos/17056969/pexels-photo-17056969/free-photo-of-ristorante-lusso-preparazione-articoli-per-la-tavola.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 3,
                'user_id' => 3,
            ],
            [
                'name' => 'La Lanterna',
                'city' => 'Alghero',
                'piva' => '34567890123',
                'img' => 'https://images.pexels.com/photos/2487438/pexels-photo-2487438.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 4,
                'user_id' => 4,
            ],
            [
                'name' => 'Gammenfre',
                'city' => 'Bergamo',
                'piva' => '45678901234',
                'img' => 'https://images.pexels.com/photos/14680058/pexels-photo-14680058.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 5,
                'user_id' => 5,
            ],
            [
                'name' => 'La Mia Patong',
                'city' => 'Gubbio',
                'piva' => '56789012345',
                'img' => 'https://images.pexels.com/photos/12876414/pexels-photo-12876414.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 6,
                'user_id' => 6,
            ],
            [
                'name' => 'La Brace',
                'city' => 'Grottaglie',
                'piva' => '67890123456',
                'img' => 'https://images.pexels.com/photos/17315461/pexels-photo-17315461/free-photo-of-ristorante-tavoli-sedie-candele.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 7,
                'user_id' => 7,
            ],
            [
                'name' => 'Osteria del Sole',
                'city' => 'Alghero',
                'piva' => '78901234567',
                'img' => 'https://images.pexels.com/photos/11775402/pexels-photo-11775402.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 8,
                'user_id' => 8,
            ],
            [
                'name' => 'La Cucina di Nonna Maria',
                'city' => 'Bergamo',
                'piva' => '89012345678',
                'img' => 'https://images.pexels.com/photos/18995450/pexels-photo-18995450/free-photo-of-ristorante-tavoli-design-sedie.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 9,
                'user_id' => 9,
            ],
            [
                'name' => 'The Stage',
                'city' => 'Gubbio',
                'piva' => '90123456789',
                'img' => 'https://images.pexels.com/photos/17056963/pexels-photo-17056963/free-photo-of-ristorante-tavolo-tavoli-sedie.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 10,
                'user_id' => 10,
            ],
            [
                'name' => 'La Lanterna',
                'city' => 'Grottaglie',
                'piva' => '10123456789',
                'img' => 'https://images.pexels.com/photos/12628906/pexels-photo-12628906.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 11,
                'user_id' => 11,
            ],
            [
                'name' => 'Ristorante Pizzeria Il Vesuvio',
                'city' => 'Alghero',
                'piva' => '11123456789',
                'img' => 'https://images.pexels.com/photos/17206101/pexels-photo-17206101/free-photo-of-tavoli-sedie-posate-schermo.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 12,
                'user_id' => 12,
            ],
            [
                'name' => 'La Trattoria dei Sogni',
                'city' => 'Bergamo',
                'piva' => '12123456789',
                'img' => 'https://images.pexels.com/photos/19295097/pexels-photo-19295097/free-photo-of-citta-estate-colorato-finestre.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 13,
                'user_id' => 13,
            ],
            [
                'name' => 'Kebab Da Samir',
                'city' => 'Gubbio',
                'piva' => '13123456789',
                'img' => 'https://images.pexels.com/photos/1653702/pexels-photo-1653702.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 14,
                'user_id' => 14,
            ],
            [
                'name' => 'La Bottega del Gusto',
                'city' => 'Grottaglie',
                'piva' => '14123456789',
                'img' => 'https://images.pexels.com/photos/19130144/pexels-photo-19130144/free-photo-of-mesa-con-pizze.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 15,
                'user_id' => 15,
            ],
            [
                'name' => 'The Stage',
                'city' => 'Alghero',
                'piva' => '15123456789',
                'img' => 'https://images.pexels.com/photos/19130186/pexels-photo-19130186/free-photo-of-pizza-ristorante-cena-pasto.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 16,
                'user_id' => 16,
            ],
            [
                'name' => 'Il Mulino',
                'city' => 'Bergamo',
                'piva' => '16123456789',
                'img' => 'https://images.pexels.com/photos/3682838/pexels-photo-3682838.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 17,
                'user_id' => 17,
            ],
            [
                'name' => 'Al Dente Trattoria',
                'city' => 'Gubbio',
                'piva' => '17123456789',
                'img' => 'https://images.pexels.com/photos/4916562/pexels-photo-4916562.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 18,
                'user_id' => 18,
            ],
            [
                'name' => 'Mangia e Bevi',
                'city' => 'Grottaglie',
                'piva' => '18123456789',
                'img' => 'https://images.pexels.com/photos/205961/pexels-photo-205961.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                'id' => 19,
                'user_id' => 19,
            ],
            // [
            //     'name' => 'Il Mangiafuoco',
            //     'city' => 'Alghero',
            //     'piva' => '19123456789',
            //     'img' => 'https://images.pexels.com/photos/4946547/pexels-photo-4946547.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 20,
            //     'user_id' => 20,
            // ],
            // [
            //     'name' => 'Osteria Antica',
            //     'city' => 'Bergamo',
            //     'piva' => '20123456789',
            //     'img' => 'https://images.pexels.com/photos/14692594/pexels-photo-14692594.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 21,
            //     'user_id' => 21,
            // ],
            // [
            //     'name' => 'La Pergola',
            //     'city' => 'Gubbio',
            //     'piva' => '21123456789',
            //     'img' => 'https://images.pexels.com/photos/13574753/pexels-photo-13574753.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 22,
            //     'user_id' => 22,
            // ],
            // [
            //     'name' => 'Il Mangiafuoco',
            //     'city' => 'Grottaglie',
            //     'piva' => '22123456789',
            //     'img' => 'https://images.pexels.com/photos/3028127/pexels-photo-3028127.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 23,
            //     'user_id' => 23,
            // ],
            // [
            //     'name' => 'Ristorante Al Castello',
            //     'city' => 'Alghero',
            //     'piva' => '23123456789',
            //     'img' => 'https://images.pexels.com/photos/16488725/pexels-photo-16488725/free-photo-of-citta-persone-strada-marciapiede.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 24,
            //     'user_id' => 24,
            // ],
            // [
            //     'name' => 'Ristorante da Carlo',
            //     'city' => 'Bergamo',
            //     'piva' => '24123456789',
            //     'img' => 'https://images.pexels.com/photos/11587655/pexels-photo-11587655.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 25,
            //     'user_id' => 25,
            // ],
            // [
            //     'name' => 'La Trattoria dei Sogni',
            //     'city' => 'Gubbio',
            //     'piva' => '25123456789',
            //     'img' => 'https://images.pexels.com/photos/15925236/pexels-photo-15925236/free-photo-of-strada-scuro-edifici-marciapiede.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 26,
            //     'user_id' => 26,
            // ],
            // [
            //     'name' => 'Los Pollos Hermanos',
            //     'city' => 'Grottaglie',
            //     'piva' => '26123456789',
            //     'img' => 'https://www.cucchiaio.it/content/cucchiaio/it/articoli/2017/05/los-pollos-hermanos-a-milano-e-roma-arriva-pollo-fritto-serie-tv/jcr:content/header-par/image-single.img.jpg/1494513938018.jpg?im=Resize=(1968)',
            //     'id' => 27,
            //     'user_id' => 27,
            // ],
            // [
            //     'name' => 'Krusty_Krab',
            //     'city' => 'Alghero',
            //     'piva' => '27123456789',
            //     'img' => 'https://en.m.wikipedia.org/wiki/Krusty_Krab#/media/File%3AThe_Krusty_Krab.png',
            //     'id' => 28,
            //     'user_id' => 28,
            // ],
            // [
            //     'name' => 'Chum_Bucket',
            //     'city' => 'Bergamo',
            //     'piva' => '28123456789',
            //     'img' => 'https://spongebob.fandom.com/wiki/Chum_Bucket?file=Single-Celled_Defense_020.png',
            //     'id' => 29,
            //     'user_id' => 29,
            // ],
            // [
            //     'name' => 'The Stage',
            //     'city' => 'Gubbio',
            //     'piva' => '29123456789',
            //     'img' => 'https://images.pexels.com/photos/6752433/pexels-photo-6752433.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            //     'id' => 30,
            //     'user_id' => 30,
            // ],
        ];


        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        };
    }
}
