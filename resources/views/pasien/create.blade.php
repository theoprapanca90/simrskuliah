@extends('layouts.app')

@section('title', 'Tambah Pasien Baru')

@section('content')
<div class="form-container">
    <h2 class="form-title"><i class="fas fa-user-injured"></i> Form Pasien Baru</h2>
    
    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('pasien.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Data Pasien</button>
        </div>
    </form>
</div>
@endsection