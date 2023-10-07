<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Company_UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->name(),
            'user_name' => $this->faker->name(),
            'user_id' => rand(1, 20),
        ];
    }
}
