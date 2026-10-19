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
        Schema::create('hostels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 50)->nullable(false);
            $table->enum('gender', ['male', 'female', 'combined']);
            $table->json('features');
            $table->text('description')->nullable();
            $table->decimal('price', 10,2);
            $table->timestamps();
        });

        Schema::create('hostel_images', function (Blueprint $table) {
            $table->id();
            $table->uuid('hostel_id');
            $table->string('path');
            $table->string('alt_text')->nullable();
            $table->timestamps();
            $table->foreign('hostel_id')->references('id')->on('hostels')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostel_images');
        Schema::dropIfExists('hostels');
    }
};
