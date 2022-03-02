<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(100),
            'description' => $this->faker->text(200),
            'regular_price' => $this->faker->numberBetween(10,500),
            'SKU' => 'DIGI' . $this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'in',
            'image' => '/storage/img/' . $this->faker->image('public/storage/img',640,480, null, false),
            'category_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
