@extends('layouts.app')

@section('title', 'Tambah Resep Baru')

@section('content')
<div class="form-container">
    <h2 class="form-title"><i class="fas fa-pills"></i> Form Resep Baru</h2>
    
    <form action="{{ route('farmasi.store') }}" method="POST" id="form-resep-baru">
        @csrf
        
        <div class="form-row">
            <div class="form-group">
                <label for="no_resep">No. Resep</label>
                <input type="text" id="no_resep" class="form-control" value="RSP-{{ date('Y') }}-{{ str_pad(rand(1, 999), 4, '0', STR_PAD_LEFT) }}" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_resep">Tanggal Resep <span style="color: var(--danger)">*</span></label>
                <input type="date" id="tanggal_resep" name="tanggal_resep" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="pasien_id">Pasien <span style="color: var(--danger)">*</span></label>
                <select id="pasien_id" name="pasien_id" class="form-control" required>
                    <option value="">Pilih Pasien</option>
                    @foreach($pasiens as $pasien)
                    <option value="{{ $pasien['id'] }}">{{ $pasien['no_rm'] }} - {{ $pasien['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dokter_id">Dokter <span style="color: var(--danger)">*</span></label>
                <select id="dokter_id" name="dokter_id" class="form-control" required>
                    <option value="">Pilih Dokter</option>
                    @foreach($dokters as $dokter)
                    <option value="{{ $dokter['id'] }}">{{ $dokter['nama'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <input type="text" id="diagnosa" name="diagnosa" class="form-control" placeholder="Diagnosa pasien">
        </div>
        
        <div class="form-group">
            <label>Daftar Obat <span style="color: var(--danger)">*</span></label>
            <div id="daftar-obat-container">
                <div class="form-row obat-item">
                    <div class="form-group" style="flex: 2;">
                        <select name="obat[0][obat_id]" class="form-control obat-select" required>
                            <option value="">Pilih Obat</option>
                            @foreach($obats as $obat)
                            <option value="{{ $obat['id'] }}">{{ $obat['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" name="obat[0][jumlah]" class="form-control" placeholder="Jumlah" min="1" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <select name="obat[0][satuan]" class="form-control" required>
                            <option value="tablet">Tablet</option>
                            <option value="kapsul">Kapsul</option>
                            <option value="sirup">Sirup</option>
                            <option value="injeksi">Injeksi</option>
                            <option value="salep">Salep</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 2;">
                        <input type="text" name="obat[0][aturan]" class="form-control" placeholder="Aturan pakai" required>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-info" id="btn-tambah-obat" style="margin-top: 10px;">
                <i class="fas fa-plus"></i> Tambah Obat Lain
            </button>
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan Resep</label>
            <textarea id="keterangan" name="keterangan" class="form-control" rows="2" placeholder="Keterangan tambahan untuk apoteker"></textarea>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('farmasi.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Resep</button>
        </div>
    </form>
</div>

@section('scripts')
<script>
    let obatCounter = 1;
    
    document.addEventListener('DOMContentLoaded', function() {
        handleFormSubmission('form-resep-baru');
        
        // Tambah obat functionality
        document.getElementById('btn-tambah-obat').addEventListener('click', function() {
            const container = document.getElementById('daftar-obat-container');
            const newObatItem = document.createElement('div');
            newObatItem.className = 'form-row obat-item';
            newObatItem.innerHTML = `
                <div class="form-group" style="flex: 2;">
                    <select name="obat[${obatCounter}][obat_id]" class="form-control obat-select" required>
                        <option value="">Pilih Obat</option>
                        @foreach($obats as $obat)
                        <option value="{{ $obat['id'] }}">{{ $obat['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="flex: 1;">
                    <input type="number" name="obat[${obatCounter}][jumlah]" class="form-control" placeholder="Jumlah" min="1" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <select name="obat[${obatCounter}][satuan]" class="form-control" required>
                        <option value="tablet">Tablet</option>
                        <option value="kapsul">Kapsul</option>
                        <option value="sirup">Sirup</option>
                        <option value="injeksi">Injeksi</option>
                        <option value="salep">Salep</option>
                    </select>
                </div>
                <div class="form-group" style="flex: 2;">
                    <input type="text" name="obat[${obatCounter}][aturan]" class="form-control" placeholder="Aturan pakai" required>
                </div>
                <div class="form-group" style="flex: 0.5;">
                    <button type="button" class="btn btn-danger btn-sm btn-hapus-obat">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            container.appendChild(newObatItem);
            obatCounter++;
            
            // Add event listener for the new delete button
            newObatItem.querySelector('.btn-hapus-obat').addEventListener('click', function() {
                if (document.querySelectorAll('.obat-item').length > 1) {
                    newObatItem.remove();
                } else {
                    alert('Resep harus memiliki minimal satu obat');
                }
            });
        });
        
        // Initialize delete buttons for existing obat items
        document.querySelectorAll('.btn-hapus-obat').forEach(btn => {
            btn.addEventListener('click', function() {
                if (document.querySelectorAll('.obat-item').length > 1) {
                    this.closest('.obat-item').remove();
                } else {
                    alert('Resep harus memiliki minimal satu obat');
                }
            });
        });
    });
</script>
@endsection
@endsection