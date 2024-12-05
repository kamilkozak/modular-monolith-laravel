<?php

namespace Module\Inventory\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use Module\Inventory\Domain\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(10)->create();
    }
}
