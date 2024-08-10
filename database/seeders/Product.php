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
        for ($i = 1; $i <= 50; $i++) {
            \DB::table('products')->insert([
                'name' => 'Producto - '.\Str::random(10),
                'description' => " There are many variations of passages of Lted humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum".\Str::random(20),
                'image' => 'https://cloudfront-eu-central-1.images.arcpublishing.com/prisaradio/54TDYNQK7ZIXZGIWJ7ICAV4U4E.jpg',
                'tax' => 1.23,
                'manufacturing_cost' => 10,
                'value' => rand(1, 99999),
            ]);
        }
    }
}
