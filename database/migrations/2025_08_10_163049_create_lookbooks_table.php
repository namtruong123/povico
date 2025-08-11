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
        Schema::create('lookbooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('hover_image')->nullable();
            $table->string('product_link')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->string('position')->nullable(); // position1, position2, ...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lookbooks');
    }
};
