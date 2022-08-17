<?php

namespace Database\Factories;

use App\Models\Proizvod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PorudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proizvod'=> Proizvod::find(random_int(1,Proizvod::count())),
            'kolicina'=> $this->faker->numberBetween($min = 1, $max = 50)
        ];
    }
}
