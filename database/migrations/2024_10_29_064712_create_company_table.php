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
        // Cek apakah tabel company sudah ada sebelum membuatnya
        if (!Schema::hasTable('company')) {
            Schema::create('company', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('country');
                $table->string('site')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};