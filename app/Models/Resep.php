<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';
    protected $fillable = [
        'no_resep',
        'tanggal_resep',
        'pasien_id',
        'dokter_id',
        'diagnosa',
        'keterangan',
        'status'
    ];

    protected $casts = [
        'tanggal_resep' => 'date',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'resep_id');
    }
}