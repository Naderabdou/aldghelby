<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'email'    => $this->faker->unique()->safeEmail(),
            'phone'    => $this->faker->phoneNumber(),
            'message'  => $this->faker->sentence(),
        ];
    }
}
