<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('logos', function (Blueprint $table) {
        $table->id();
        $table->string('regular_logo')->nullable();
        $table->string('light_logo')->nullable();
        $table->string('small_logo')->nullable();
        $table->string('favicon')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logos');
    }
};
