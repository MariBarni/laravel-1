<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
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
            'started_at' => now()->subMonths(
                $this->faker->numberBetween(3,12)
            ),
            'finished_at' => $current?null: now()->addMonths(
                $this->faker->numberBetween(3,12)
            ),
            
            'job_title_id' =>  $this->faker->randomDigit(), 
            'company_id' =>  $this->faker->randomDigit(), 
            'profile_id' =>  $this->faker->randomDigit() 
           
        ];
    }
}
