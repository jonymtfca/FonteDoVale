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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name_pt');
            $table->string('name_en');
            $table->string('ingredients_pt');
            $table->string('ingredients_en');
            $table->string('path');
            $table->string('half_price')->nullable();
            $table->string('price');
            $table->integer('type');
            $table->date('date')->nullable();
            $table->boolean('is_menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
