@extends('layouts.app')

@section('title', 'Tambah Pembayaran Baru')

@section('content')
<div class="form-container">
    <h2 class="form-title"><i class="fas fa-file-invoice-dollar"></i> Form Pembayaran Baru</h2>
    
    <form action="{{ route('keuangan.store') }}" method="POST" id="form-pembayaran-baru">
        @csrf
        
        <div class="form-row">
            <div class="form-group">
                <label for="no_transaksi">No. Transaksi</label>
                <input type="text" id="no_transaksi" class="form-control" value="TRX-{{ date('Y') }}-{{ str_pad(rand(1, 999), 4, '0', STR_PAD_LEFT) }}" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_bayar">Tanggal Bayar <span style="color: var(--danger)">*</span></label>
                <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="form-control" value="{{ date('Y-m-d') }}" required>
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
                <label for="jenis_pembayaran">Jenis Pembayaran <span style="color: var(--danger)">*</span></label>
                <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control" required>
                    <option value="">Pilih Jenis</option>
                    <option value="Rawat Jalan">Rawat Jalan</option>
                    <option value="Rawat Inap">Rawat Inap</option>
                    <option value="IGD">IGD</option>
                    <option value="Laboratorium">Laboratorium</option>
                    <option value="Radiologi">Radiologi</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="detail_tagihan">Detail Tagihan <span style="color: var(--danger)">*</span></label>
            <div id="detail-tagihan-container" style="background: #f8f9fa; padding: 15px; border-radius: 5px;">
                <div class="form-row">
                    <div class="form-group" style="flex: 2;">
                        <input type="text" class="form-control" placeholder="Item tagihan" value="Konsultasi Dokter" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" class="form-control" value="1" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" class="form-control" value="150000" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" class="form-control" value="150000" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="flex: 2;">
                        <input type="text" class="form-control" placeholder="Item tagihan" value="Obat" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" class="form-control" value="1" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" class="form-control" value="85000" readonly>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <input type="number" class="form-control" value="85000" readonly>
                    </div>
                </div>
                <div style="text-align: right; margin-top: 10px; font-weight: bold;">
                    Total: Rp 235.000
                </div>
            </div>
            <input type="hidden" name="detail_tagihan" value='[{"item":"Konsultasi Dokter","jumlah":1,"harga":150000,"subtotal":150000},{"item":"Obat","jumlah":1,"harga":85000,"subtotal":85000}]'>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar <span style="color: var(--danger)">*</span></label>
                <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control" placeholder="Jumlah pembayaran" required value="235000">
            </div>
            <div class="form-group">
                <label for="metode_bayar">Metode Pembayaran <span style="color: var(--danger)">*</span></label>
                <select id="metode_bayar" name="metode_bayar" class="form-control" required>
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer">Transfer Bank</option>
                    <option value="Kartu Kredit">Kartu Kredit</option>
                    <option value="Kartu Debit">Kartu Debit</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="status_bayar">Status Pembayaran <span style="color: var(--danger)">*</span></label>
                <select id="status_bayar" name="status_bayar" class="form-control" required>
                    <option value="Lunas">Lunas</option>
                    <option value="Pending">Pending</option>
                    <option value="Sebagian">Sebagian</option>
                </select>
            </div>
            <div class="form-group">
                <label for="diskon">Diskon (jika ada)</label>
                <input type="number" id="diskon" name="diskon" class="form-control" placeholder="Jumlah diskon" value="0">
            </div>
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan Pembayaran</label>
            <textarea id="keterangan" name="keterangan" class="form-control" rows="2" placeholder="Keterangan tambahan mengenai pembayaran"></textarea>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('keuangan.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
        </div>
    </form>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        handleFormSubmission('form-pembayaran-baru');
        
        // Auto calculate total when items change
        const calculateTotal = () => {
            let total = 235000; // Default value
            const diskon = parseFloat(document.getElementById('diskon').value) || 0;
            const jumlahBayar = total - diskon;
            document.getElementById('jumlah_bayar').value = jumlahBayar > 0 ? jumlahBayar : 0;
        };
        
        document.getElementById('diskon').addEventListener('input', calculateTotal);
    });
</script>
@endsection
@endsection