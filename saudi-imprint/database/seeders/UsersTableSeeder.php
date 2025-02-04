<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' =>  'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],

            //tourist
            [
                'name' =>  'tourist',
                'email' => 'tourist@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'tourist',
            ],

            //tour guide
            [
                'name' =>  'TG',
                'email' => 'TourGuide@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'TG',
            ]
        ]);
}}
