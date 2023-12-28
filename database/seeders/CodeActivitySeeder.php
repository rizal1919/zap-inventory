<?php

namespace Database\Seeders;

use App\Models\CodeActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CodeActivity::truncate();

        // Flow V1.1
        $data = [
            // Auth
            ['code_activity' => 101, 'activity_name' => 'Login'],
            ['code_activity' => 102, 'activity_name' => 'Logout'],

            // Category
            ['code_activity' => 103, 'activity_name' => 'Create category'],
            ['code_activity' => 104, 'activity_name' => 'Update category'],

            // Items
            ['code_activity' => 105, 'activity_name' => 'Create item'],
            ['code_activity' => 106, 'activity_name' => 'Update item'],

            // Computers
            ['code_activity' => 107, 'activity_name' => 'Create data computer'],
            ['code_activity' => 108, 'activity_name' => 'Update data computer'],

            // Computers
            ['code_activity' => 109, 'activity_name' => 'Create data service'],
            ['code_activity' => 110, 'activity_name' => 'Update data service'],
        ];

        CodeActivity::insert($data);
    }
}
