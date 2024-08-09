<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('products')->insert([
            'name' => \Str::random(10),
            'description' => \Str::random(20),
            'image' => 'https://cloudfront-eu-central-1.images.arcpublishing.com/prisaradio/54TDYNQK7ZIXZGIWJ7ICAV4U4E.jpg',
            'tax' => 1.23,
            'manufacturing_cost' => 10,
            'value' => 30,
        ]);
    }
}
