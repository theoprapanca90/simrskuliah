<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class RawatInapController extends Controller
{
    public function index()
    {
        $rawatInap = DataService::getRawatInap();
        return view('rawat-inap.index', compact('rawatInap'));
    }

    public function create()
    {
        $pasien = DataService::getPasien();
        $dokter = DataService::getDokter()->where('status', 'Aktif');
        $ruanganOptions = DataService::getRuanganOptions();
        $kelasOptions = DataService::getKelasRawatOptions();
        
        return view('rawat-inap.create', compact('pasien', 'dokter', 'ruanganOptions', 'kelasOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'ruangan' => 'required',
            'tanggal_masuk' => 'required|date',
            'dokter_id' => 'required',
            'diagnosa_awal' => 'required',
        ]);

        $newRawatInap = DataService::addRawatInap($request->all());

        return redirect()->route('rawat-inap.index')
            ->with('success', 'Data rawat inap berhasil disimpan.');
    }

    public function show($id)
    {
        $rawatInap = DataService::findRawatInap($id);
        
        if (!$rawatInap) {
            return redirect()->route('rawat-inap.index')
                ->with('error', 'Data rawat inap tidak ditemukan.');
        }

        return view('rawat-inap.show', compact('rawatInap'));
    }

    public function edit($id)
    {
        $rawatInap = DataService::findRawatInap($id);
        
        if (!$rawatInap) {
            return redirect()->route('rawat-inap.index')
                ->with('error', 'Data rawat inap tidak ditemukan.');
        }

        $pasien = DataService::getPasien();
        $dokter = DataService::getDokter()->where('status', 'Aktif');
        $ruanganOptions = DataService::getRuanganOptions();
        $kelasOptions = DataService::getKelasRawatOptions();

        return view('rawat-inap.edit', compact('rawatInap', 'pasien', 'dokter', 'ruanganOptions', 'kelasOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pasien_id' => 'required',
            'ruangan' => 'required',
            'tanggal_masuk' => 'required|date',
            'dokter_id' => 'required',
            'diagnosa_awal' => 'required',
        ]);

        $updated = DataService::updateRawatInap($id, $request->all());

        if ($updated) {
            return redirect()->route('rawat-inap.index')
                ->with('success', 'Data rawat inap berhasil diupdate.');
        }

        return redirect()->route('rawat-inap.index')
            ->with('error', 'Data rawat inap tidak ditemukan.');
    }

    public function destroy($id)
    {
        $deleted = DataService::deleteRawatInap($id);

        if ($deleted) {
            return redirect()->route('rawat-inap.index')
                ->with('success', 'Data rawat inap berhasil dihapus.');
        }

        return redirect()->route('rawat-inap.index')
            ->with('error', 'Data rawat inap tidak ditemukan.');
    }

    public function pulangkan($id)
    {
        $updated = DataService::pulangkanPasien($id);

        if ($updated) {
            return redirect()->route('rawat-inap.index')
                ->with('success', 'Pasien berhasil dipulangkan.');
        }

        return redirect()->route('rawat-inap.index')
            ->with('error', 'Data rawat inap tidak ditemukan.');
    }
}