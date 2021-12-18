<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));

        return [
            'model' => $this->faker->vehicleModel,
            'brand' => $this->faker->vehicleBrand,
            'year' => $this->faker->dateTimeBetween('1969', '2021')->format('Y'),
            'plate' => strtoupper(Str::random(7))
        ];
    }
}
