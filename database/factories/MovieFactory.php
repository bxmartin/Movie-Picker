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
            //runtime can be any number with 3 or less digits, so 128 or 50 etc
            'runtime' => fake()->randomNumber(3, false),
            //true or false
            'watched' => fake()->boolean()
        ];
    }
}
