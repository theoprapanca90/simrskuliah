<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $transaksi = DataService::getTransaksi();
        return view('keuangan.index', compact('transaksi'));
    }

    public function create()
    {
        $pasien = DataService::getPasien();
        $jenisOptions = DataService::getJenisPembayaranOptions();
        $metodeOptions = DataService::getMetodeBayarOptions();
        $statusOptions = DataService::getStatusBayarOptions();
        
        return view('keuangan.create', compact('pasien', 'jenisOptions', 'metodeOptions', 'statusOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'jenis_pembayaran' => 'required',
            'jumlah_bayar' => 'required|numeric|min:0',
            'metode_bayar' => 'required',
        ]);

        $data = $request->all();
        
        // Process detail transaksi jika ada
        if ($request->has('items')) {
            $data['detail_transaksi'] = array_map(function($item) {
                return [
                    'item' => $item['item'],
                    'jumlah' => $item['jumlah'] ?? 1,
                    'harga' => $item['harga'],
                    'subtotal' => ($item['jumlah'] ?? 1) * $item['harga']
                ];
            }, $request->items);
        }

        $newTransaksi = DataService::addTransaksi($data);

        return redirect()->route('keuangan.index')
            ->with('success', 'Transaksi berhasil disimpan.');
    }

    public function show($id)
    {
        $transaksi = DataService::findTransaksi($id);
        
        if (!$transaksi) {
            return redirect()->route('keuangan.index')
                ->with('error', 'Data transaksi tidak ditemukan.');
        }

        return view('keuangan.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = DataService::findTransaksi($id);
        
        if (!$transaksi) {
            return redirect()->route('keuangan.index')
                ->with('error', 'Data transaksi tidak ditemukan.');
        }

        $pasien = DataService::getPasien();
        $jenisOptions = DataService::getJenisPembayaranOptions();
        $metodeOptions = DataService::getMetodeBayarOptions();
        $statusOptions = DataService::getStatusBayarOptions();

        return view('keuangan.edit', compact('transaksi', 'pasien', 'jenisOptions', 'metodeOptions', 'statusOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pasien_id' => 'required',
            'jenis_pembayaran' => 'required',
            'jumlah_bayar' => 'required|numeric|min:0',
            'metode_bayar' => 'required',
        ]);

        $updated = DataService::updateTransaksi($id, $request->all());

        if ($updated) {
            return redirect()->route('keuangan.index')
                ->with('success', 'Transaksi berhasil diupdate.');
        }

        return redirect()->route('keuangan.index')
            ->with('error', 'Data transaksi tidak ditemukan.');
    }

    public function destroy($id)
    {
        $deleted = DataService::deleteTransaksi($id);

        if ($deleted) {
            return redirect()->route('keuangan.index')
                ->with('success', 'Transaksi berhasil dihapus.');
        }

        return redirect()->route('keuangan.index')
            ->with('error', 'Data transaksi tidak ditemukan.');
    }

    public function laporan()
    {
        $transaksi = DataService::getTransaksi();
        $pendapatanBulanIni = $transaksi->sum('jumlah_bayar');
        $transaksiBulanIni = $transaksi->count();

        return view('keuangan.laporan', compact('pendapatanBulanIni', 'transaksiBulanIni', 'transaksi'));
    }
}