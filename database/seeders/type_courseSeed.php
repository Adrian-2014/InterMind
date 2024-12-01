<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class type_courseSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Path ke file CSV
        $csvPath = database_path('seeders/csv/type_courses.csv');

        // Cek apakah file ada
        if (!File::exists($csvPath)) {
            $this->command->error("CSV file not found: {$csvPath}");
            return;
        }

        // Baca isi file CSV
        $csvData = array_map('str_getcsv', file($csvPath));

        // Ambil header (baris pertama)
        $headers = array_map('trim', $csvData[0]);
        unset($csvData[0]); // Hapus header dari data

        // Proses setiap baris menjadi array asosiatif
        $dataToInsert = [];
        foreach ($csvData as $row) {
            $dataToInsert[] = array_combine($headers, $row);
        }

        // Insert data ke tabel 'posts'
        DB::table('type_courses')->insert($dataToInsert);

        $this->command->info('Post data seeded successfully from CSV.');
    }
}
