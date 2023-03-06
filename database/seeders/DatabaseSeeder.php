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
           // 'user_id'=> $user->id
        ]);   
        $experience=\App\Models\Experience::factory(5)->create([
             'profile_id'=> $profile->id
         ]);  
         $education=\App\Models\Education::factory(5)->create([
            'profile_id'=> $profile->id
        ]); 

       
    }
}
