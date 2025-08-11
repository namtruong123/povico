<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('hotline')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('zalo')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->text('about')->nullable();
            $table->string('info_title')->nullable();
            $table->string('about_text')->nullable();
            $table->string('about_link')->nullable();
            $table->string('stories_text')->nullable();
            $table->string('stories_link')->nullable();
            $table->string('size_guide_text')->nullable();
            $table->string('size_guide_link')->nullable();
            $table->string('contact_text')->nullable();
            $table->string('contact_link')->nullable();
            $table->string('customer_service_title')->nullable();
            $table->string('shipping_text')->nullable();
            $table->string('shipping_link')->nullable();
            $table->string('return_text')->nullable();
            $table->string('return_link')->nullable();
            $table->string('privacy_text')->nullable();
            $table->string('privacy_link')->nullable();
            $table->string('terms_text')->nullable();
            $table->string('terms_link')->nullable();
            $table->string('newsletter_title')->nullable();
            $table->string('newsletter_placeholder')->nullable();
            $table->string('newsletter_button')->nullable();
            $table->string('copyright')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
