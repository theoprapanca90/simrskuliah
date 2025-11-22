<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class FarmasiController extends Controller
{
    public function index()
    {
        $resep = DataService::getResep();
        return view('farmasi.index', compact('resep'));
    }

    public function create()
    {
        $pasien = DataService::getPasien();
        $dokter = DataService::getDokter()->where('status', 'Aktif');
        $obat = DataService::getObat();
        
        return view('farmasi.create', compact('pasien', 'dokter', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'diagnosa' => 'required',
            'detail_resep' => 'required|array|min:1',
            'detail_resep.*.obat_id' => 'required',
            'detail_resep.*.jumlah' => 'required|numeric|min:1',
            'detail_resep.*.aturan_pakai' => 'required',
        ]);

        $data = $request->all();
        
        // Process detail resep
        $data['detail_resep'] = array_map(function($detail) {
            $obat = DataService::getObat()->firstWhere('id', $detail['obat_id']);
            return [
                'obat_id' => $detail['obat_id'],
                'nama_obat' => $obat['nama_obat'],
                'jumlah' => $detail['jumlah'],
                'satuan' => $detail['satuan'],
                'aturan_pakai' => $detail['aturan_pakai']
            ];
        }, $data['detail_resep']);

        $newResep = DataService::addResep($data);

        return redirect()->route('farmasi.index')
            ->with('success', 'Resep berhasil disimpan.');
    }

    public function show($id)
    {
        $resep = DataService::findResep($id);
        
        if (!$resep) {
            return redirect()->route('farmasi.index')
                ->with('error', 'Data resep tidak ditemukan.');
        }

        return view('farmasi.show', compact('resep'));
    }

    public function edit($id)
    {
        $resep = DataService::findResep($id);
        
        if (!$resep) {
            return redirect()->route('farmasi.index')
                ->with('error', 'Data resep tidak ditemukan.');
        }

        $pasien = DataService::getPasien();
        $dokter = DataService::getDokter()->where('status', 'Aktif');
        $obat = DataService::getObat();

        return view('farmasi.edit', compact('resep', 'pasien', 'dokter', 'obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'diagnosa' => 'required',
        ]);

        $updated = DataService::updateResep($id, $request->all());

        if ($updated) {
            return redirect()->route('farmasi.index')
                ->with('success', 'Resep berhasil diupdate.');
        }

        return redirect()->route('farmasi.index')
            ->with('error', 'Data resep tidak ditemukan.');
    }

    public function destroy($id)
    {
        $deleted = DataService::deleteResep($id);

        if ($deleted) {
            return redirect()->route('farmasi.index')
                ->with('success', 'Resep berhasil dihapus.');
        }

        return redirect()->route('farmasi.index')
            ->with('error', 'Data resep tidak ditemukan.');
    }

    public function proses($id)
    {
        $updated = DataService::prosesResep($id);

        if ($updated) {
            return redirect()->route('farmasi.index')
                ->with('success', 'Resep berhasil diproses.');
        }

        return redirect()->route('farmasi.index')
            ->with('error', 'Data resep tidak ditemukan.');
    }
}