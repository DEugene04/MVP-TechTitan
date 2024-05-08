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
        Schema::create('food_mains', function (Blueprint $table) {
            $table->id();
            $table->string('IDFoodMain');
            $table->string('NamaFoodMain');
            $table->integer('HargaOriFoodMain');
            $table->string('JenisFoodMain');
            $table->string('FotoFoodMain');
            $table->string('DeskripsiFoodMain');
            $table->string('QuantityFoodMain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_mains');
    }
};
