<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $fillable = [
        'id_dokter',
        'nama_dokter',
        'gelar',
        'spesialisasi',
        'no_sip',
        'telepon',
        'email',
        'jadwal_praktek',
        'tanggal_bergabung',
        'status'
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date',
    ];
}