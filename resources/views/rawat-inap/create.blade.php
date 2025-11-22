@extends('layouts.app')

@section('title', 'Tambah Rawat Inap Baru')

@section('content')
<div class="page-title">
    <h1>Tambah Rawat Inap Baru</h1>
</div>

<div class="form-container">
    <form action="{{ route('rawat-inap.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="no_rm">No. Rekam Medis <span style="color: var(--danger)">*</span></label>
                <select id="no_rm" name="no_rm" class="form-control" required>
                    <option value="">Pilih Pasien</option>
                    @foreach($pasien as $p)
                    <option value="{{ $p->no_rm }}" {{ old('no_rm') == $p->no_rm ? 'selected' : '' }}>
                        {{ $p->no_rm }} - {{ $p->nama_pasien }}
                    </option>
                    @endforeach
                </select>
                @error('no_rm')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk <span style="color: var(--danger)">*</span></label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required>
                @error('tanggal_masuk')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="ruangan">Ruangan <span style="color: var(--danger)">*</span></label>
                <select id="ruangan" name="ruangan" class="form-control" required>
                    <option value="">Pilih Ruangan</option>
                    <option value="301 - Mawar" {{ old('ruangan') == '301 - Mawar' ? 'selected' : '' }}>301 - Mawar (Kelas VIP)</option>
                    <option value="302 - Melati" {{ old('ruangan') == '302 - Melati' ? 'selected' : '' }}>302 - Melati (Kelas I)</option>
                    <option value="303 - Anggrek" {{ old('ruangan') == '303 - Anggrek' ? 'selected' : '' }}>303 - Anggrek (Kelas II)</option>
                    <option value="304 - Tulip" {{ old('ruangan') == '304 - Tulip' ? 'selected' : '' }}>304 - Tulip (Kelas III)</option>
                </select>
                @error('ruangan')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="dokter_id">Dokter Penanggung Jawab <span style="color: var(--danger)">*</span></label>
                <select id="dokter_id" name="dokter_id" class="form-control" required>
                    <option value="">Pilih Dokter</option>
                    @foreach($dokter as $d)
                    <option value="{{ $d->id }}" {{ old('dokter_id') == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_dokter }} ({{ $d->spesialisasi }})
                    </option>
                    @endforeach
                </select>
                @error('dokter_id')
                    <small style="color: var(--danger);">{{ $message }}</small>
                @enderror
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="kelas_rawat">Kelas Perawatan</label>
                <select id="kelas_rawat" name="kelas_rawat" class="form-control">
                    <option value="VIP" {{ old('kelas_rawat') == 'VIP' ? 'selected' : '' }}>VIP</option>
                    <option value="Kelas I" {{ old('kelas_rawat') == 'Kelas I' ? 'selected' : '' }}>Kelas I</option>
                    <option value="Kelas II" {{ old('kelas_rawat') == 'Kelas II' ? 'selected' : 'selected' }}>Kelas II</option>
                    <option value="Kelas III" {{ old('kelas_rawat') == 'Kelas III' ? 'selected' : '' }}>Kelas III</option>
                </select>
            </div>
            <div class="form-group">
                <label for="perkiraan_lama_rawat">Perkiraan Lama Rawat (hari)</label>
                <input type="number" id="perkiraan_lama_rawat" name="perkiraan_lama_rawat" class="form-control" min="1" max="30" value="{{ old('perkiraan_lama_rawat', 3) }}">
            </div>
        </div>
        
        <div class="form-group">
            <label for="diagnosa_awal">Diagnosa Awal <span style="color: var(--danger)">*</span></label>
            <textarea id="diagnosa_awal" name="diagnosa_awal" class="form-control" rows="3" placeholder="Diagnosa awal pasien" required>{{ old('diagnosa_awal') }}</textarea>
            @error('diagnosa_awal')
                <small style="color: var(--danger);">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tindakan_awal">Tindakan Awal</label>
            <textarea id="tindakan_awal" name="tindakan_awal" class="form-control" rows="2" placeholder="Tindakan medis yang akan dilakukan">{{ old('tindakan_awal') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan Tambahan</label>
            <textarea id="keterangan" name="keterangan" class="form-control" rows="2" placeholder="Keterangan tambahan untuk perawatan">{{ old('keterangan') }}</textarea>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('rawat-inap.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Data Rawat Inap</button>
        </div>
    </form>
</div>
@endsection