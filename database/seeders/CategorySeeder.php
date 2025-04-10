<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Pizza', 'Desserts'];

        foreach ($categories as $category) {
            MenuCategory::updateOrCreate(['name' => $category]);
        }
    }
}
