<?php

namespace Database\Factories;

use App\Models\Proizvodjac;
use App\Models\Tip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\proizvod>
 */
class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'ime'=>$this->faker->companySuffix(),
            'cena'=>$this->faker->numberBetween(0,100000),
            'proizvodjac_id'=>Proizvodjac::factory(),
            'tip_id'=>Tip::factory()
        ];
    }
}
