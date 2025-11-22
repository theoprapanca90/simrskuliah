@extends('layouts.app')

@section('title', 'Manajemen Pasien')

@section('content')
<div class="page-title">
    <h1>Manajemen Pasien</h1>
    <div>
        <a href="{{ route('pasien.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Pasien Baru
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
    <h2 style="margin-bottom: 15px;">Daftar Pasien</h2>
    <table>
        <thead>
            <tr>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pasien as $item)
            <tr>
                <td>{{ $item['no_rm'] }}</td>
                <td>{{ $item['nama_pasien'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['tanggal_lahir'])->age }} tahun</td>
                <td>{{ $item['jenis_kelamin'] }}</td>
                <td>{{ $item['telepon'] }}</td>
                <td><span class="status aktif">Aktif</span></td>
                <td>
                    <a href="{{ route('pasien.show', $item['id']) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('pasien.edit', $item['id']) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('pasien.destroy', $item['id']) }}" method="POST" style="display: inline;">
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
                <td colspan="7" style="text-align: center;">Tidak ada data pasien</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection