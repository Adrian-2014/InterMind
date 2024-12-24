<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class teacherSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::insert([
            [
                'name' => 'Kipp Thorne',
                'email' => 'kipp2014@gmail.com',
                'no_telepon' => '0896716322441',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '20/06/1961')->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('kipp2014'),
            ],
            [
                'name' => 'Amelia Brand',
                'email' => 'amelia@gmail.com',
                'no_telepon' => '083455718942',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '07/05/1892')->format('Y-m-d'),
                'jenis_kelamin' => 'Perempuan',
                'password' => Hash::make('amelia'),
            ],
            [
                'name' => 'Albert Einstein',
                'email' => 'albert11@gmail.com',
                'no_telepon' => '083457213390',
                'tanggal_lahir' => \DateTime::createFromFormat('d/m/Y', '28/09/1880')->format('Y-m-d'),
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('albert11'),
            ],
        ]);
    }
}
