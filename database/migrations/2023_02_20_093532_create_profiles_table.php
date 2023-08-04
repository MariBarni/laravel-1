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
            /*$table->uuid('uuid')->unique();     */  
            $table->string('token');
            $table->string('name');
            $table->string('vorname');
            $table->string('wunschposition')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('handynummer')->nullable();
            $table->string('geburtstag')->nullable();
            $table->string('geburtsort')->nullable();
            $table->string('straße')->nullable();
            $table->string('plz')->nullable();
            $table->string('ort')->nullable();
            $table->string('land')->nullable();
            $table->string('profileimg')->nullable();       
            $table->string('tags')->nullable(); 
            $table->foreignId('user_id')->nullable();    
            $table->string('full_name')->virtualAs('concat(name, \' \', vorname)');
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
