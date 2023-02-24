<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biography' => $this->faker->paragraphs(5, true),
            'name' => $this->faker->name(),
            'lastname' => $this->faker->name(),
            'email'=> $this->faker->email(),
            'phone'=> $this->faker->phoneNumber(),
            'birthday'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address'=> $this->faker->streetAddress(),
            'plz'=> $this->faker->postcode(),
            'City'=> $this->faker->city(),
            'Country'=> $this->faker->country (),
            'profileimg'=> $this->faker->file($sourceDir = '/tmp', $targetDir = '/tmp'),
            'skill_id'=> $this->faker->word(),
            'language_id'=> $this->faker->word(),
            'remember_token' => Str::random(10),
            "job_title_id" => Jobtitle::factory(),
        ];
    }
}

