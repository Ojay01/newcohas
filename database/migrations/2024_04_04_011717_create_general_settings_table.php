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
        Schema::create('general_settings', function (Blueprint $table) {
    $table->id();
    $table->string('website_title');
    $table->json('social_links')->nullable();
    $table->string('homepage_note_title');
    $table->longText('homepage_note_description');
    $table->string('copyright_text');
    $table->string('header_logo')->nullable();
    $table->string('footer_logo')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
