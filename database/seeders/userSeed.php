<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::insert([
            [
                'name' => 'Adrian Kurniawan',
                'email' => 'iansantay199@gmail.com',
                'no_telepon' => '082139283161',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '17/11/2006')->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('ian199'),
            ],
            [
                'name' => 'Nizar Risqullah',
                'email' => 'nizar_88gmail.com',
                'no_telepon' => '08190038205',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '12/05/1962')->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('b00b5'),
            ],
        ]);
    }
}
