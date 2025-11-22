@extends('layouts.app')

@section('title', 'Manajemen Rawat Inap')

@section('content')
<div class="page-title">
    <h1>Manajemen Rawat Inap</h1>
    <div>
        <a href="{{ route('rawat-inap.create') }}" class="btn btn-warning">
            <i class="fas fa-plus"></i> Rawat Inap Baru
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
    <h2 style="margin-bottom: 15px;">Daftar Pasien Rawat Inap</h2>
    <table>
        <thead>
            <tr>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Ruangan</th>
                <th>Tanggal Masuk</th>
                <th>Diagnosa</th>
                <th>Dokter</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rawatInap as $item)
            <tr>
                <td>{{ $item['no_rm'] }}</td>
                <td>{{ $item['nama_pasien'] }}</td>
                <td>{{ $item['ruangan'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['tanggal_masuk'])->format('d-m-Y') }}</td>
                <td>{{ Str::limit($item['diagnosa_awal'], 50) }}</td>
                <td>{{ $item['nama_dokter'] }}</td>
                <td>
                    <span class="status {{ $item['status'] == 'Dirawat' ? 'rawat' : 'pulang' }}">
                        {{ $item['status'] }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('rawat-inap.show', $item['id']) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('rawat-inap.edit', $item['id']) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    @if($item['status'] == 'Dirawat')
                    <form action="{{ route('rawat-inap.pulangkan', $item['id']) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Apakah pasien sudah pulang?')">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                    @endif
                    <form action="{{ route('rawat-inap.destroy', $item['id']) }}" method="POST" style="display: inline;">
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
                <td colspan="8" style="text-align: center;">Tidak ada data rawat inap</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection