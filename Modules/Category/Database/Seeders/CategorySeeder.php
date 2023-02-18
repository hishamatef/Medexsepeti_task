<?php

namespace Modules\Category\Database\Seeders;

use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();
    }
}
