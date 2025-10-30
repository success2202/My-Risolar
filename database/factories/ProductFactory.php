<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' =>rand(1,9),
            'name' => $this->faker->name(),
            'title' => $this->faker->realText(30,2),
            'description' => $this->faker->paragraph(4),
            'image_path' => $this->faker->imageUrl(640, 480, true, 'png'), 
            'price' => $this->faker->biasedNumberBetween(2000, 2500),
            'sale_price' => $this->faker->biasedNumberBetween(2000, 2500), 
            'discount' => rand(11,99), 
            'views' => rand(11,99), 
            'order_count' => rand(11,99), 
            'sku' => 'SKU'.rand(1111,9999), 
            'qty' => rand(11,99), 
            'status' => rand(0,1),
        ];
    }
}
