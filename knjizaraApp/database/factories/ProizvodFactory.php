<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv'=> $this->faker->randomElement($array = array ('sveska A4','sveska A5','hem. olovka plava','hem. olovka crv')),
            'opis'=> $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'cena'=> $this->faker->numberBetween($min = 100, $max = 1000)
        ];
    }
}
