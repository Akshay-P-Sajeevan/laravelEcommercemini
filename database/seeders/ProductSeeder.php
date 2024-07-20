<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Remove all existing records from the products table
        Product::query()->delete();

        // Seed the products table with sample data
        Product::create([
            'name' => 'Product 1',
            'price' => 100.00,
            'description' => 'Description for Product 1',
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 200.00,
            'description' => 'Description for Product 2',
        ]);
    }
}
