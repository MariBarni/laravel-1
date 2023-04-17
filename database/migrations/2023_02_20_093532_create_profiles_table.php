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
            $table->string('Name');
            $table->string('Vorname');
            $table->string('Wunschposition');
            $table->string('E-Mail')->unique()->nullable();
            $table->string('Handynummer')->nullable();
            $table->string('Geburtstag')->nullable();
            $table->string('Geburtsort')->nullable();
            $table->string('Straße')->nullable();
            $table->string('PLZ')->nullable();
            $table->string('Ort')->nullable();
            $table->string('Land')->nullable();
            $table->string('profileimg')->nullable();       
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
