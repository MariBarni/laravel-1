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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            
            $table->string('abschluss')->nullable();            
            $table->string('bildungseinrichtung')->nullable();
            $table->string('fachrichtung')->nullable();
            $table->string('orth')->nullable();
            $table-> boolean('currente')->default(false);
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
        Schema::dropIfExists('educations');
    }
};
