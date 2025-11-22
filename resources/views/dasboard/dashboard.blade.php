@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-title">
    <h1 id="page-title">Dashboard</h1>
    <div id="action-buttons"></div>
</div>

<div id="dashboard-content">
    {{-- Dashboard Cards --}}
    <div class="dashboard-cards">

        {{-- Total Pasien --}}
        <div class="card pasien">
            <div class="card-header">
                <div>
                    <div class="card-value">{{ $total_pasien ?? 0 }}</div>
                    <div class="card-label">Total Pasien</div>
                </div>
                <div class="card-icon">
                    <i class="fas fa-user-injured"></i>
                </div>
            </div>
            <div class="card-footer">
                <small>Data pasien terdaftar</small>
            </div>
        </div>

        {{-- Total Dokter --}}
        <div class="card dokter">
            <div class="card-header">
                <div>
                    <div class="card-value">{{ $total_dokter ?? 0 }}</div>
                    <div class="card-label">Dokter Aktif</div>
                </div>
                <div class="card-icon">
                    <i class="fas fa-user-md"></i>
                </div>
            </div>
            <div class="card-footer">
                <small>Dokter yang aktif bertugas</small>
            </div>
        </div>

        {{-- Rawat Inap --}}
        <div class="card rawat-inap">
            <div class="card-header">
                <div>
                    <div class="card-value">{{ $total_rawat_inap ?? 0 }}</div>
                    <div class="card-label">Rawat Inap</div>
                </div>
                <div class="card-icon">
                    <i class="fas fa-procedures"></i>
                </div>
            </div>
            <div class="card-footer">
                <small>Pasien dalam perawatan</small>
            </div>
        </div>

        {{-- Resep --}}
        <div class="card farmasi">
            <div class="card-header">
                <div>
                    <div class="card-value">{{ $total_resep ?? 0 }}</div>
                    <div class="card-label">Resep Bulan Ini</div>
                </div>
                <div class="card-icon">
                    <i class="fas fa-pills"></i>
                </div>
            </div>
            <div class="card-footer">
                <small>Resep yang diterbitkan</small>
            </div>
        </div>

        {{-- Pendapatan --}}
        <div class="card pendapatan">
            <div class="card-header">
                <div>
                    <div class="card-value">Rp {{ number_format($pendapatan_bulan_ini ?? 0, 0, ',', '.') }}</div>
                    <div class="card-label">Pendapatan Bulan Ini</div>
                </div>
                <div class="card-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
            <div class="card-footer">
                <small>Total pendapatan bulan ini</small>
            </div>
        </div>

        {{-- Pengeluaran --}}
        <div class="card keuangan">
            <div class="card-header">
                <div>
                    <div class="card-value">Rp {{ number_format($pengeluaran_bulan_ini ?? 0, 0, ',', '.') }}</div>
                    <div class="card-label">Pengeluaran</div>
                </div>
                <div class="card-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
            </div>
            <div class="card-footer">
                <small>Total pengeluaran bulan ini</small>
            </div>
        </div>
    </div>

    {{-- Menu Super Admin --}}
    <div class="superadmin-menu mt-5">
        <h2><i class="fas fa-user-shield"></i> Menu Super Admin</h2>
        <div class="admin-cards">
            <x-dashboard.card route="pasien.index" icon="fa-user-injured" title="Manajemen Pasien" desc="Kelola data pasien, rekam medis, dan riwayat kunjungan" />
            <x-dashboard.card route="dokter.index" icon="fa-user-md" title="Manajemen Dokter" desc="Kelola data dokter, jadwal praktek, dan spesialisasi" />
            <x-dashboard.card route="rawat-inap.index" icon="fa-procedures" title="Manajemen Rawat Inap" desc="Kelola ruangan dan perawatan pasien" />
            <x-dashboard.card route="farmasi.index" icon="fa-pills" title="Manajemen Farmasi" desc="Kelola stok obat dan distribusi" />
            <x-dashboard.card route="keuangan.index" icon="fa-file-invoice-dollar" title="Manajemen Keuangan" desc="Kelola pembayaran dan laporan keuangan" />
        </div>
    </div>

    {{-- Data Master --}}
    <div class="data-master mt-5">
        <h2>Data Master</h2>
        <div class="master-cards">
            <x-dashboard.info icon="fa-stethoscope" label="Poli Klinik" :value="$total_poli ?? 0" />
            <x-dashboard.info icon="fa-bed" label="Ruangan" :value="$total_kamar ?? 0" />
            <x-dashboard.info icon="fa-pills" label="Jenis Obat" :value="$total_obat ?? 0" />
            <x-dashboard.info icon="fa-flask" label="Jenis Pemeriksaan Lab" :value="$total_lab ?? 0" />
            <x-dashboard.info icon="fa-calendar-alt" label="Jadwal Dokter" :value="$total_jadwal ?? 0" />
            <x-dashboard.info icon="fa-procedures" label="Jenis Layanan" :value="$total_layanan ?? 0" />
        </div>
    </div>
</div>
@endsection
