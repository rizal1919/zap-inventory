<?php

namespace Database\Seeders;

use App\Models\StatusCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusCode::truncate();

        // Flow V1.1
        $data = [
            // Status Code
            ['code_id' => 100, 'status' => 'Digunakan'],
            ['code_id' => 101, 'status' => 'Afkir'],
            ['code_id' => 102, 'status' => 'Servis'],
            ['code_id' => 103, 'status' => 'Aktif (Tidak Digunakan)'],
            ['code_id' => 104, 'status' => 'Non Aktif'],
            ['code_id' => 105, 'status' => 'Sukses'],
            ['code_id' => 106, 'status' => 'Gagal'],
            ['code_id' => 107, 'status' => 'In Progress'],
            ['code_id' => 108, 'status' => 'Completed'],
        ];

        StatusCode::insert($data);
    }
}
