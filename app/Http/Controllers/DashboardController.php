<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Resep;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $resep = Resep::all();
        $transaksi = Transaksi::whereMonth('created_at', date('m'))->get();

        // Siapkan data untuk dikirim ke view
        $data = [
            'total_pasien' => $pasien->count(),
            'total_dokter' => $dokter->count(),
            'total_resep' => $resep->count(),
            'pendapatan_bulan_ini' => $transaksi->sum('jumlah_bayar'),
            'pengeluaran_bulan_ini' => 187000000,
        ];

        // Tampilkan ke view dashboard.blade.php
        return view('dashboard', $data);
    }
}
