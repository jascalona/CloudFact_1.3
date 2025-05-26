<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>fake()->unique()->firstName(),
            'rif' => fake()->text(),
            'tipo' => fake()->text(),
            'cant_device' => fake()->text(),
            'p_contact'=> fake()->text(),
            'p_email'=> fake()->email(),
            'p_movil'=> fake()->phoneNumber(),
            'obser'=> fake()->text(),


        ];
    }
}
