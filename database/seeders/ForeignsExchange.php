<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForeignsExchange extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('foreigns_exchange')->insert([
            'name' => 'PESO COLOMBIANO',
            'symbol' => 'COP',
            'value' => 4081.50,//VALOR QUE EQUIVALE A UN DOLAR VS LA DIVISA REGISTRADA
        ]);
    }
}
