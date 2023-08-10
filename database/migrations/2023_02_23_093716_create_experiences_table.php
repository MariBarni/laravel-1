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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
           
            $table->string('jname')->nullable();
            $table->string('cnname')->nullable();
            $table->text('description')->nullable();
            $table-> boolean('currentj')->default(false);
            $table->date('started_at');
            $table->date('finished_at')->nullable();
            $table->integer('sort')->nullable();          
            $table->foreignId('profile_id')->references('id')->on('profiles')->cascadeOnDelete();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
