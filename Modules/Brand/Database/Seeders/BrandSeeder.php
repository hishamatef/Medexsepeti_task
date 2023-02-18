<?php

namespace Modules\Brand\Database\Seeders;

use Modules\Brand\Entities\Brand;
use Modules\Product\Entities\Product;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory(5)->create();
    }
}
