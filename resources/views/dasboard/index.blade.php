@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Dashboard Cards -->
<div class="dashboard-cards">
    <div class="card pasien">
        <div class="card-header">
            <div>
                <div class="card-value">{{ $stats['total_pasien'] }}</div>
                <div class="card-label">Total Pasien</div>
            </div>
            <div class="card-icon">
                <i class="fas fa-user-injured"></i>
            </div>
        </div>
        <div class="card-footer">
            <small>+12% dari bulan lalu</small>
        </div>
    </div>
    
    <div class="card dokter">
        <div class="card-header">
            <div>
                <div class="card-value">{{ $stats['dokter_aktif'] }}</div>
                <div class="card-label">Dokter Aktif</div>
            </div>
            <div class="card-icon">
                <i class="fas fa-user-md"></i>
            </div>
        </div>
        <div class="card-footer">
            <small>5 dokter sedang bertugas</small>
        </div>
    </div>
    
    <div class="card rawat-inap">
        <div class="card-header">
            <div>
                <div class="card-value">{{ $stats['rawat_inap'] }}</div>
                <div class="card-label">Rawat Inap</div>
            </div>
            <div class="card-icon">
                <i class="fas fa-procedures"></i>
            </div>
        </div>
        <div class="card-footer">
            <small>Tersisa 14 tempat tidur</small>
        </div>
    </div>
    
    <div class="card farmasi">
        <div class="card-header">
            <div>
                <div class="card-value">{{ $stats['resep_bulan_ini'] }}</div>
                <div class="card-label">Resep Bulan Ini</div>
            </div>
            <div class="card-icon">
                <i class="fas fa-pills"></i>
            </div>
        </div>
        <div class="card-footer">
            <small>12 obat hampir habis</small>
        </div>
    </div>
    
    <div class="card pendapatan">
        <div class="card-header">
            <div>
                <div class="card-value">{{ $stats['pendapatan'] }}</div>
                <div class="card-label">Pendapatan Bulan Ini</div>
            </div>
            <div class="card-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
        </div>
        <div class="card-footer">
            <small>+8% dari bulan lalu</small>
        </div>
    </div>
    
    <div class="card keuangan">
        <div class="card-header">
            <div>
                <div class="card-value">{{ $stats['pengeluaran'] }}</div>
                <div class="card-label">Pengeluaran</div>
            </div>
            <div class="card-icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
        </div>
        <div class="card-footer">
            <small>+5% dari bulan lalu</small>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="table-container">
    <h2 style="padding: 15px; margin: 0; border-bottom: 1px solid #eee;">Aktivitas Terbaru</h2>
    <table>
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Aktivitas</th>
                <th>User</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recent_activities as $activity)
            <tr>
                <td>{{ $activity['time'] }}</td>
                <td>{{ $activity['activity'] }}</td>
                <td>{{ $activity['user'] }}</td>
                <td>{{ $activity['detail'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection