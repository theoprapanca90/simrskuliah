@extends('layouts.app')

@section('title', 'Detail Resep')

@section('action-buttons')
<a href="{{ route('farmasi.index') }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Kembali
</a>
<a href="{{ route('farmasi.edit', $resep['id']) }}" class="btn btn-success">
    <i class="fas fa-edit"></i> Edit
</a>
<a href="#" class="btn btn-info" onclick="window.print()">
    <i class="fas fa-print"></i> Print
</a>
@endsection

@section('content')
<div class="form-container">
    <h2 class="form-title"><i class="fas fa-pills"></i> Detail Resep</h2>
    
    <div class="form-row">
        <div class="form-group">
            <label>No. Resep</label>
            <div class="form-control" style="background: #f8f9fa;">{{ $resep['no_resep'] }}</div>
        </div>
        <div class="form-group">
            <label>Tanggal Resep</label>
            <div class="form-control" style="background: #f8f9fa;">{{ $resep['tanggal_resep'] }}</div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label>Nama Pasien</label>
            <div class="form-control" style="background: #f8f9fa;">{{ $resep['nama_pasien'] }}</div>
        </div>
        <div class="form-group">
            <label>Dokter</label>
            <div class="form-control" style="background: #f8f9fa;">{{ $resep['dokter'] }}</div>
        </div>
    </div>
    
    <div class="form-group">
        <label>Diagnosa</label>
        <div class="form-control" style="background: #f8f9fa;">{{ $resep['diagnosa'] ?? '-' }}</div>
    </div>
    
    <div class="form-group">
        <label>Daftar Obat</label>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Aturan Pakai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resep['obat'] as $obat)
                    <tr>
                        <td>{{ $obat['nama'] }}</td>
                        <td>{{ $obat['jumlah'] }}</td>
                        <td>{{ $obat['satuan'] }}</td>
                        <td>{{ $obat['aturan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="form-group">
        <label>Keterangan</label>
        <div class="form-control" style="background: #f8f9fa; height: auto; min-height: 60px;">{{ $resep['keterangan'] ?? '-' }}</div>
    </div>
    
    <div class="form-group">
        <label>Status</label>
        <div>
            <span class="status {{ strtolower($resep['status']) }}">
                {{ $resep['status'] }}
            </span>
        </div>
    </div>
</div>
@endsection