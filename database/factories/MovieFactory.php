<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //a random latin word for the name
            'name' => fake()->word(),
            //a genre picked from three options
            'genre' => fake()->randomElement($array = array ('Horror', 'Comedy', 'Action')),
            //runtime can be any number between 1 and 180
            'runtime' => fake()->numberBetween(1, 180),
            //rating between 0 and 10
            'rating' => fake()->numberBetween(0, 10),
            //true or false
            'watched' => fake()->boolean(),
            //releaseyear can be any number between 1900 and 2023
            'releaseyear' => fake()->numberBetween(1900, 2024),
            //effort picked from three options
            'effort' => fake()->randomElement($array = array ('Easy', 'Medium', 'Hard'))
        ];
    }
}
