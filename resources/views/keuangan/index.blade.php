@extends('layouts.app')

@section('title', 'Manajemen Keuangan')

@section('content')
<div class="page-title">
    <h1>Manajemen Keuangan</h1>
    <div>
        <a href="{{ route('keuangan.create') }}" class="btn btn-info">
            <i class="fas fa-plus"></i> Pembayaran Baru
        </a>
        <a href="{{ route('keuangan.laporan') }}" class="btn btn-success">
            <i class="fas fa-chart-bar"></i> Laporan
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="table-container">
    <h2 style="margin-bottom: 15px;">Daftar Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No. Transaksi</th>
                <th>Tanggal</th>
                <th>Pasien</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $item)
            <tr>
                <td>{{ $item['no_transaksi'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['tanggal_bayar'])->format('d-m-Y') }}</td>
                <td>{{ $item['nama_pasien'] }}</td>
                <td>{{ $item['jenis_pembayaran'] }}</td>
                <td>Rp {{ number_format($item['jumlah_bayar'], 0, ',', '.') }}</td>
                <td>
                    <span class="status {{ $item['status_bayar'] == 'Lunas' ? 'selesai' : ($item['status_bayar'] == 'Pending' ? 'menunggu' : 'proses') }}">
                        {{ $item['status_bayar'] }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('keuangan.show', $item['id']) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('keuangan.edit', $item['id']) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('keuangan.destroy', $item['id']) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data transaksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection