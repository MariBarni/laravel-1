<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'test',
            'email' => 'test@stimme.de'
        ]);

        Experience::factory(10)->create([
            'profile_id' => $user->profile->id
        ]);

        Link::factory(3)->create([
            'profile_id' => $user->profile->id
        ]);
    }
}
