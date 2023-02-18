<?php

namespace Modules\Product\Database\factories;

use App\Enums\Discounts;
use App\Enums\Status;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $discountValues = [0, 5, 10, 15, 20, 25, 30];
        $randomDiscountValue = $discountValues[array_rand($discountValues)];
        $price = $this->faker->numberBetween(100,1000);

        return [
            'name'=> $this->faker->name,
            'barcode'=> $this->faker->ean13(),
            'short_description'=> $this->faker->realText(150),
            'long_description'=> $this->faker->realText(),
            'price'=> $price,
            'price_after_discount'=> $price - $randomDiscountValue,
            'quantity'=> $this->faker->randomDigitNotNull(),
            'views'=> $this->faker->randomDigitNotNull(),
            'category_id'=> Category::query()->inRandomOrder()->value('id'),
            'brand_id'=> Brand::query()->inRandomOrder()->value('id'),
            'status'=> Status::ACTIVE,
            'discount'=> $randomDiscountValue,
            'discount_type'=> $randomDiscountValue != 0 ? Discounts::FIXED : null,
            'discount_start_at'=> $randomDiscountValue != 0 ? $this->faker->dateTime('-7 days') : null,
            'discount_end_at'=> $randomDiscountValue != 0 ? $this->faker->dateTimeBetween('0 months', '+7 days') : null
        ];
        return [
            'name' => $this->faker->name(),
            'category_id' => $category_id,
        ];
    }
}
