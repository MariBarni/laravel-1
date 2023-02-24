<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Language;
use App\Models\User;
use App\Models\Skill;
use App\Models\JobTitle;
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
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(), 
            "jobtitle_id" =>  $this->faker->randomDigit(),
            'email'=> $this->faker->email(),
            'phone'=> $this->faker->phoneNumber(),
            'birthday'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address'=> $this->faker->streetAddress(),
            'plz'=> $this->faker->postcode(),
            'City'=> $this->faker->city(),
            'Country'=> $this->faker->country(),
            'biography' => $this->faker->paragraphs(1, true),
            'profileimg'=> $this->faker->word(),
            'skill_id'=>  $this->faker->randomDigit(),
            'language_id'=>  $this->faker->randomDigit(),       
            'user_id' =>  $this->faker->randomDigit()
        ];
    }
}

