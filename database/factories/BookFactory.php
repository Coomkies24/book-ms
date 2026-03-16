<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'genre' => $this->faker->randomElement([
                'Fiction','Sci-Fi','History','Romance','Education'
            ]),
            'published_year' => $this->faker->numberBetween(1990,2024)
        ];
    }
}