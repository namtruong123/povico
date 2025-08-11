<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('attribute_group_id')->nullable()->constrained('product_attribute_groups')->onDelete('set null');
            $table->decimal('price', 15, 2);
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->integer('quantity')->default(0);
            $table->string('main_image')->nullable();
            $table->text('description')->nullable();
            $table->text('specifications')->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
