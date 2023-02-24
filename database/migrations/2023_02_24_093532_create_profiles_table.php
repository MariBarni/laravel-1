<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->foreignID('jobtitle_id'); 
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('plz')->nullable();
            $table->string('City')->nullable();
            $table->string('Country')->nullable();
            $table->longText('biography')->nullable();
            $table->string('profileimg')->nullable();           
            $table->foreignId('skill_id');
            $table->foreignId('language_id');     
            $table->foreignId('user_id');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
