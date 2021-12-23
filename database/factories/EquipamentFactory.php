<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EquipamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->words(1, true),
            'description_aux' => $this->faker->sentence,
            'obs' => $this->faker->sentence,
            'serial' => Str::random(10),
            'status' => $this->faker->randomNumber(1),
            'user_id' => 1,
        ];
    }
}
