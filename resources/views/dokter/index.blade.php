@extends('layouts.app')

@section('title', 'Manajemen Dokter')

@section('content')
<div class="page-title">
    <h1>Manajemen Dokter</h1>
    <div>
        <a href="{{ route('dokter.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Dokter Baru
        </a>
    </div>
</div>

<div class="table-container">
    <h2 style="margin-bottom: 15px;">Daftar Dokter</h2>
    <table>
        <thead>
            <tr>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>No. SIP</th>
                <th>Status</th>
                <th>Jadwal Praktek</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokter as $item)
            <tr>
                <td>{{ $item->id_dokter }}</td>
                <td>{{ $item->nama_dokter }}{{ $item->gelar ? ', ' . $item->gelar : '' }}</td>
                <td>{{ $item->spesialisasi }}</td>
                <td>{{ $item->no_sip }}</td>
                <td>
                    <span class="status {{ $item->status == 'Aktif' ? 'aktif' : 'tidak-aktif' }}">
                        {{ $item->status }}
                    </span>
                </td>
                <td>{{ $item->jadwal_praktek ?? '-' }}</td>
                <td>
                    <a href="{{ route('dokter.show', $item->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('dokter.edit', $item->id) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('dokter.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection