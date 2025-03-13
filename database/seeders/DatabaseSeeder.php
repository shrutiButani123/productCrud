<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category = Category::create(['name' => 'Electronics']);
        $categoryStationery = Category::create(['name' => 'Stationery']);
        Subcategory::create(['name' => 'Mobile Phones', 'category_id' => $category->id]);
        Subcategory::create(['name' => 'Laptops', 'category_id' => $category->id]);
        Subcategory::create(['name' => 'Pencil', 'category_id' => $categoryStationery->id]);
        Subcategory::create(['name' => 'Pen', 'category_id' => $categoryStationery->id]);    
    }
}
