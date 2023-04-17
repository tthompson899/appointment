<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'annual cleaning',
                'bonding',
                'bridges',
                'crowns',
                'dentures',
                'fillings',
                'hygiene',
                'implants',
                'inlays',
                'invisalign_vid',
                'orthodontics',
                'partial dentures',
                'perodontal',
                'TMJ',
                'root canal',
                'veneers',
                'whitening'
            ])
        ];
    }
}
