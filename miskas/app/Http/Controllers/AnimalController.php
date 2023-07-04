<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // testavimo tikslais tik. Niekada nerasyti jokiu duomenu i controlleri
    public $animals = [
        [
            'name' => 'Bobikas',
            'type' => 'dog',
            'description' => 'Labai geras suniukas',
            'price' => 500
        ],
        [
            'name' => 'Pukis',
            'type' => 'cat',
            'description' => 'Labai geras katinukas',
            'price' => 300
        ],
        [
            'name' => 'Pypis',
            'type' => 'parrot',
            'description' => 'Labai geras papuga',
            'price' => 100
        ],
        [
            'name' => 'Rainis',
            'type' => 'cat',
            'description' => 'Labai geras katinukas',
            'price' => 800
        ],
    ];

    // irasymas per query
    public function index(Request $request)
    {
        // return 'Welcome to the jungle, where you can find all animals!' . $request->what;

        // is blade perkelimas -> folderis.failas
        return view('forest.index', [
            'what' => $request->what ?? 'no no no',
            'who' => 'Doctor Dolittle',
            // testavimo tikslais, paziureti, ka rodo what ir who
            'yes' => true
        ]);
    }

    // irasymas per parametra. optional parametrai, nurodome default parametra ir galime padavineti kitus
    public function racoon(string $color = 'black')
    {
        return '<h1 style="color:' . $color . ';">Hello Racoon!</h1>';
    }

    public function animals()
    {

        $collection = collect($this->animals);

        
        // chane`inimas - kolekciju metodu jungimas i viena

        // $collection = 
        // $collection->map(function ($item) {
        //     $item['price'] = $item['price'] . ' Eur';
        //     return $item;
        // })
        // ->filter(function ($item) {
        //     return $item['type'] != 'dog';
        // })
        // ->sortBy('type');

        // collection sort
        // collection map - kai norim ka nors prideti
        // collection filter - kai norim ka nors ismest

        $collection = $collection->pluck('type')->unique()->all();

        // issipausdinti array narsykleje arba terminale. bet nelabai naudosim
        dump($collection);

        return view('forest.animals', [
            'animals' => $collection
        ]);

    }
}
