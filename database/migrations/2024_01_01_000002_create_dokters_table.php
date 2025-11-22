<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('id_dokter')->unique();
            $table->string('nama_dokter');
            $table->string('gelar')->nullable();
            $table->string('spesialisasi');
            $table->string('no_sip');
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->text('jadwal_praktek')->nullable();
            $table->date('tanggal_bergabung');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokter');
    }
};