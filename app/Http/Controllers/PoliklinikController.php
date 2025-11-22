<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Poliklinik::all();
        return view('master.poli.poli_create', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_poli' => 'required'
        ]);
        Poliklinik::create($validated);
        return redirect()->route('poli.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function show(Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poliklinik::findOrFail($id)->delete();
        return redirect()->route('poli.index')->with('success', 'Data Berhasil Dihapus');
    }
}
