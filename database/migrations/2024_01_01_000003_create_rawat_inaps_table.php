<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rawat_inaps', function (Blueprint $table) {
            $table->id();
            $table->string('no_rawat')->unique();
            $table->foreignId('pasien_id')->constrained('pasiens');
            $table->string('ruangan');
            $table->date('tanggal_masuk');
            $table->foreignId('dokter_id')->constrained('dokters');
            $table->enum('kelas_rawat', ['VIP', 'Kelas I', 'Kelas II', 'Kelas III']);
            $table->integer('perkiraan_lama_rawat');
            $table->text('diagnosa_awal');
            $table->text('tindakan_awal')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Dirawat', 'Pulang', 'Rujuk'])->default('Dirawat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rawat_inaps');
    }
};