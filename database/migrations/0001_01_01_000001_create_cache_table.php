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
        // ✅ Cek dulu apakah tabel cache sudah ada
        if (!Schema::hasTable('cache')) {
            Schema::create('cache', function (Blueprint $table) {
                $table->string('key')->primary();
                $table->mediumText('value');
                $table->integer('expiration');
            });
        }

        // ✅ Cek dulu apakah tabel cache_locks sudah ada
        if (!Schema::hasTable('cache_locks')) {
            Schema::create('cache_locks', function (Blueprint $table) {
                $table->string('key')->primary();
                $table->string('owner');
                $table->integer('expiration');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ✅ Drop hanya jika tabel ada
        if (Schema::hasTable('cache_locks')) {
            Schema::dropIfExists('cache_locks');
        }

        if (Schema::hasTable('cache')) {
            Schema::dropIfExists('cache');
        }
    }
};
