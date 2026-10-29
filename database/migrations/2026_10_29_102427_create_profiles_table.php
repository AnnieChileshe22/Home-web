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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary(true);
            $table->string('title', 20);
            $table->string('first_name', 30);
            $table->string('middle_name', 30)->nullable(true);
            $table->string('last_name', 30);
            $table->string('management_role', 100);
            $table->string('profile_pic');
            $table->text('biography');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
