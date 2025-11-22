<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_poli = Poliklinik::all();
        $get_dokter = Dokter::all();
        $data = Pasien::all();
        return view('master.pasien.pasien_create', compact('data', 'get_dokter', 'get_poli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InapPasien()
    {
        $data = Pasien::where('cara_masuk', 'Rawat-Inap')->get();
        return view('master.pasien.pasien_inap', compact('data'));
    }

    public function JalanPasien()
    {
        $data = Pasien::where('cara_masuk', 'Rawat-Jalan')->get();
        return view('master.pasien.pasien_jalan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rawat' => 'required',
            'nama_pasien' => 'required|max:50|min:1',
            'umur' => 'required',
            'jk' => 'required',
            'poli' => 'required',
            'nama_pj' => 'required|max:50|min:1',
            'alamat_pj' => 'required',
            'no_telp_pj' => 'required|max:15|min:5',
            'dokter_pj' => 'required',
            'jenis_bayar' => 'required',
            'cara_masuk' => 'required'
        ]);
        Pasien::create($validated);
        return redirect()->route('pasien.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = Pasien::findOrFail($id);
        return view('master.pasien.pasien_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get_poli = Poliklinik::all();
        $get_dokter = Dokter::all();
        $data = Pasien::findOrFail($id);
        return view('master.pasien.pasien_update', compact('data', 'get_dokter', 'get_poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rawat' => 'required',
            'nama_pasien' => 'required|max:50|min:1',
            'umur' => 'required',
            'jk' => 'required',
            'poli' => 'required',
            'nama_pj' => 'required|max:50|min:1',
            'alamat_pj' => 'required',
            'no_telp_pj' => 'required|max:15|min:5',
            'dokter_pj' => 'required',
            'jenis_bayar' => 'required',
            'cara_masuk' => 'required'
        ]);
        $data = Pasien::findOrFail($id);
        $data->update($validated);
        return redirect()->route('pasien.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pasien::find($id);
        $data->delete();
        return redirect()->route('pasien.index')->with('success', 'Data Berhasil Dihapus');
    }
}
