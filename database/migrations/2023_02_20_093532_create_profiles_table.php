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
            $table->string('vorname');
            $table->string('wunschposition');
            $table->string('e-mail')->unique()->nullable();
            $table->string('handynummer')->nullable();
            $table->string('geburtstag')->nullable();
            $table->string('geburtsort')->nullable();
            $table->string('straße')->nullable();
            $table->string('plz')->nullable();
            $table->string('ort')->nullable();
            $table->string('land')->nullable();
            $table->string('profileimg')->nullable();     
            $table->string('token')->nullable(); 
            $table->string('template')->nullable(); 
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
