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
        $user =\App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@stimme.de'
        ]);
        $profile=\App\Models\Profile::factory()->create([
            'user_id'=> $user->id
        ]);

        $experience=\App\Models\Experience::factory(10)->create([
            'expericence_id' => $profile->id
        ]);
        $education=\App\Models\Education::factory(10)->create([
            'education_id' => $education->id
        ]);
        $skill=\App\Models\Skill::factory(10)->create([
            'skill_id' => $skill->id
        ]);
        $language=\App\Models\Language::factory(10)->create([
            'language_id' => $language->id
        ]);

        $link=\App\Models\Link::factory(3)->create([
            'profile_id' =>$profile->id
        ]);
    }
}
