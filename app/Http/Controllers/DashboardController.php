<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Services\DataService;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $pasien = Pasien::all();
        $dokter = Dokter::all();

        // Ambil data dari DataService (in-memory)
        $resep = DataService::getResep();
        $transaksi = DataService::getTransaksi();

        // Filter transaksi bulan ini
        $transaksi_bulan_ini = $transaksi->filter(function ($item) {
            return isset($item['created_at']) &&
                   date('m', strtotime($item['created_at'])) == date('m');
        });

        // Siapkan data untuk dikirim ke view
        $data = [
            'total_pasien' => $pasien->count(),
            'total_dokter' => $dokter->count(),
            'total_resep' => $resep->count(),
            'pendapatan_bulan_ini' => $transaksi_bulan_ini->sum('jumlah_bayar'),
            'pengeluaran_bulan_ini' => 187000000,
        ];

        // Tampilkan ke view dashboard.blade.php
        return view('dashboard', $data);
    }
}
