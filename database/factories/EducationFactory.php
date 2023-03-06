<?php

namespace Database\Factories;
use App\Models\Profile;
use App\Models\Institution;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'field_of_study' => $this->faker->word(),
            'degree'=> $this->faker->word(),
            'current' => $current = $this->faker->boolean(),
            'started_at' => now()->subMonths(
                $this->faker->numberBetween(3,12)
            ),
            'finished_at' => $current?null: now()->addMonths(
                $this->faker->numberBetween(3,12)
            ),
            'sort'=>  $this->faker->randomDigit(),
            'institution_id' => Institution::factory(),  
            'profile_id' => Profile::factory()
                       
        ];
    }
}
