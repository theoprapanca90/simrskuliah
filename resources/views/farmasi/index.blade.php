@extends('layouts.app')

@section('title', 'Manajemen Farmasi')

@section('action-buttons')
<a href="{{ route('farmasi.create') }}" class="btn btn-purple">
    <i class="fas fa-plus"></i> Resep Baru
</a>
@endsection

@section('content')
<div class="table-container">
    <h2 style="margin-bottom: 15px;">Daftar Resep</h2>
    <table>
        <thead>
            <tr>
                <th>No. Resep</th>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Obat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resep as $r)
            <tr>
                <td>{{ $r['no_resep'] }}</td>
                <td>{{ $r['tanggal'] }}</td>
                <td>{{ $r['nama_pasien'] }}</td>
                <td>{{ $r['dokter'] }}</td>
                <td>{{ $r['obat'] }}</td>
                <td>
                    <span class="status {{ strtolower($r['status']) }}">
                        {{ $r['status'] }}
                    </span>
                </td>
                <td>
                    <div style="display: flex; gap: 5px;">
                        <a href="{{ route('farmasi.show', $r['id']) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('farmasi.edit', $r['id']) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('farmasi.destroy', $r['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <a href="#" class="btn btn-info btn-sm">
                            <i class="fas fa-print"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection