<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Report extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('reports')->insert([
            'name' => 'Reporte 1',
            'file' => 'VXNlcm5hbWU7IElkZW50aWZpZXI7T25lLXRpbWUgcGFzc3dvcmQ7UmVjb3ZlcnkgY29kZTtGaXJzdCBuYW1lO0xhc3QgbmFtZTtEZXBhcnRtZW50O0xvY2F0aW9uCmJvb2tlcjEyOzkwMTI7MTJzZTc0O3JiOTAxMjtSYWNoZWw7Qm9va2VyO1NhbGVzO01hbmNoZXN0ZXIKZ3JleTA3OzIwNzA7MDRhcDY3O2xnMjA3MDtMYXVyYTtHcmV5O0RlcG90O0xvbmRvbgpqb2huc29uODE7NDA4MTszMG5vODY7Y2o0MDgxO0NyYWlnO0pvaG5zb247RGVwb3Q7TG9uZG9uCmplbmtpbnM0Njs5MzQ2OzE0anU3MzttajkzNDY7TWFyeTtKZW5raW5zO0VuZ2luZWVyaW5nO01hbmNoZXN0ZXIKc21pdGg3OTs1MDc5OzA5amE2MTtqczUwNzk7SmFtaWU7U21pdGg7RW5naW5lZXJpbmc7TWFuY2hlc3Rlcg==',
            'date_ini' => '2024-08-22 17:54:56',
            'date_end' => '2024-08-22 17:54:56',
        ]);

    }
}
