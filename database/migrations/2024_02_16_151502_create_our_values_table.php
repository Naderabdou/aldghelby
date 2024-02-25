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
        Schema::create('our_values', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('title_ar')->unique();
            $table->string('title_en')->unique();
            $table->longText('services_ar')->nullable();
            $table->longText('services_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_values');
    }
};
