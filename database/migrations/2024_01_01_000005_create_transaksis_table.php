<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi')->unique();
            $table->foreignId('pasien_id')->constrained('pasiens');
            $table->enum('jenis_pembayaran', ['Rawat Jalan', 'Rawat Inap', 'IGD', 'Laboratorium', 'Radiologi']);
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar', 15, 2);
            $table->enum('metode_bayar', ['Tunai', 'Transfer', 'Kartu Kredit', 'Kartu Debit']);
            $table->enum('status_bayar', ['Lunas', 'Pending', 'Sebagian'])->default('Lunas');
            $table->decimal('diskon', 15, 2)->default(0);
            $table->text('keterangan')->nullable();
            $table->json('detail_tagihan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};