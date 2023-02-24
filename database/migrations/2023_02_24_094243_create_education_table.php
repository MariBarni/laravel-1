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
        Schema::create('education', function (Blueprint $table) {
            $table->id();            
            $table->text('field_of_study');
            $table->text('degree');
            $table-> boolean('current')->default(false);
            $table->date('started_at');
            $table->date('finished_at')->nullable();
            $table->integer('sort')->nullable();
            $table->foreignId('institution_id');
            $table->foreignId('profile_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
