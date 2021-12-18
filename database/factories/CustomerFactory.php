<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'document_number' => $this->faker->cpf(),
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2015-12-31')->format('Y-m-d')
        ];
    }
}
