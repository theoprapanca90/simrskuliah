<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    use HasFactory;

    protected $table = 'detail_resep';
    protected $fillable = [
        'resep_id',
        'obat_id',
        'jumlah',
        'satuan',
        'aturan_pakai'
    ];

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'resep_id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}