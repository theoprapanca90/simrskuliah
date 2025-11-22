<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'jenis_obat',
        'satuan',
        'stok',
        'harga',
        'expired_date',
        'keterangan'
    ];

    protected $casts = [
        'expired_date' => 'date',
    ];
}