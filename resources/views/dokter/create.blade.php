@extends('layouts.app')

@section('title', 'Tambah Dokter Baru')

@section('content')
<div class="page-title">
    <h1>Tambah Dokter Baru</h1>
</div>

<div class="form-container">
    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="nama_dokter">Nama Lengkap <span style="color: var(--danger)">*</span></label>
                <input type="text" id="nama_dokter" name="nama_dokter" class="form-control" value="{{ old('nama_dokter') }}" required>
                @error('nama_dokter')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="gelar">Gelar</label>
                <input type="text" id="gelar" name="gelar" class="form-control" value="{{ old('gelar') }}" placeholder="Contoh: Sp.A, Sp.PD">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="spesialisasi">Spesialisasi <span style="color: var(--danger)">*</span></label>
                <select id="spesialisasi" name="spesialisasi" class="form-control" required>
                    <option value="">Pilih Spesialisasi</option>
                    <option value="Umum" {{ old('spesialisasi') == 'Umum' ? 'selected' : '' }}>Dokter Umum</option>
                    <option value="Penyakit Dalam" {{ old('spesialisasi') == 'Penyakit Dalam' ? 'selected' : '' }}>Penyakit Dalam</option>
                    <option value="Bedah" {{ old('spesialisasi') == 'Bedah' ? 'selected' : '' }}>Bedah</option>
                    <option value="Anak" {{ old('spesialisasi') == 'Anak' ? 'selected' : '' }}>Anak</option>
                    <option value="Kandungan" {{ old('spesialisasi') == 'Kandungan' ? 'selected' : '' }}>Kandungan</option>
                </select>
                @error('spesialisasi')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_sip">No. SIP <span style="color: var(--danger)">*</span></label>
                <input type="text" id="no_sip" name="no_sip" class="form-control" value="{{ old('no_sip') }}" placeholder="Nomor Surat Izin Praktek" required>
                @error('no_sip')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="telepon">No. Telepon <span style="color: var(--danger)">*</span></label>
                <input type="tel" id="telepon" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
                @error('telepon')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="tanggal_bergabung">Tanggal Bergabung <span style="color: var(--danger)">*</span></label>
                <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" class="form-control" value="{{ old('tanggal_bergabung') }}" required>
                @error('tanggal_bergabung')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : 'selected' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="jadwal_praktek">Jadwal Praktek</label>
            <textarea id="jadwal_praktek" name="jadwal_praktek" class="form-control" rows="3" placeholder="Contoh: Senin - Jumat, 08:00-16:00">{{ old('jadwal_praktek') }}</textarea>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('dokter.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Data Dokter</button>
        </div>
    </form>
</div>
@endsection