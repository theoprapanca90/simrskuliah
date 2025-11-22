<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'no_rawat',
        'nama_pasien',
        'umur',
        'jk',
        'poli',
        'nama_pj',
        'alamat_pj',
        'no_telp_pj',
        'dokter_pj',
        'jenis_bayar',
        'cara_masuk',
        'id_kamar',
    ];
}
