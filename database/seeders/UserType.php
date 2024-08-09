<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users_type')->insert([
            'name' => 'Administrador',
        ]);

        \DB::table('users_type')->insert([
            'name' => 'Cliente',
        ]);
    }
}
