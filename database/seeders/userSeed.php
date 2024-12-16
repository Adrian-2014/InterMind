<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Adrian Kurniawan',
                'email' => 'iansantay199@gmail.com',
                'no_telepon' => '082139283161',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '17/11/2006')->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('ian199'),
            ],
            [
                'name' => 'Thomas Shelby',
                'email' => 'shelby1919@gmail.com',
                'no_telepon' => '08190038205',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '07/05/1892')->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('shelby19'),
            ],
        ]);
    }
}
