<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

    protected $table = 'rawat_inap';
    protected $fillable = [
        'no_rm',
        'ruangan',
        'tanggal_masuk',
        'dokter_id',
        'kelas_rawat',
        'perkiraan_lama_rawat',
        'diagnosa_awal',
        'tindakan_awal',
        'keterangan',
        'status'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rm', 'no_rm');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}