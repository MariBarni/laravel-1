<?php

namespace Database\Factories;

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
            'description' => $this->faker->paragraphs(3, true),
            'current' => $current = $this->faker->boolean(),
            'profile_id' => Profile::factory(),
            'institution_id' => Institution::factory(),
            'started_at' => $startDate = now()->subMonths($this->faker->numberBetween(1, 16)),
            'finished_at' => $current ? null : $startDate->addMonths($this->faker->numberBetween(1, 6)),
        ];
    }
}
