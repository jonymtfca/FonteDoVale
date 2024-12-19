<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_pt' => fake()->randomElement(['Posta Mirandesa', 'Frango assado', 'Feijoada']),
            'name_en' => fake()->randomElement(['Beans', 'Roasted chicken', 'Grilled Steak']),
            'ingredients_pt' => fake()->randomElement(['350g de carne bovina, batata frita, arroz e salada ', 'Frango, batata, salada ', 'Feijão, arroz']),
            'ingredients_en' => fake()->randomElement(['350g of beef, French fries, rice, and salad ', 'Chicken, salad', 'Beans, rice']),
            'path' => fake()->randomElement(['Q5gykGE4iF4Wz2BcayokJbDpCV4N7itFgdnXrRdD.jpg', 'vi3GVXHq1CZ3NipDEAIG7xYvD1Kdxw7gFUBaj6HE.jpg ']),
            'price' => fake()->randomElement(['12.99€', '90.99€', '30.99€', '20.50€']),
            'half_price' => fake()->randomElement(['6.99€', '9.99€', '5.99€', '8.50€']),
            'type' => fake()->randomElement(['1', '2', '3']),
            'is_menu' => fake()->boolean
        ];
    }
}

