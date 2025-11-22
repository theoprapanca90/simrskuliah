<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->string('no_resep')->unique();
            $table->foreignId('pasien_id')->constrained('pasiens');
            $table->foreignId('dokter_id')->constrained('dokters');
            $table->date('tanggal_resep');
            $table->string('diagnosa')->nullable();
            $table->json('obat');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Proses', 'Selesai', 'Dibatalkan'])->default('Proses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};