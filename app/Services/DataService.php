<?php

namespace App\Services;

class DataService
{
    private static $pasien = [];
    private static $dokter = [];
    private static $rawatInap = [];
    private static $resep = [];
    private static $transaksi = [];
    private static $obat = [];

    public static function init()
    {
        // Data Obat (tetap sama seperti sebelumnya)
        self::$obat = [
            [
                'id' => 1,
                'kode_obat' => 'OBT-0001',
                'nama_obat' => 'Paracetamol 500mg',
                'jenis_obat' => 'Tablet',
                'satuan' => 'Tablet',
                'stok' => 100,
                'harga' => 5000,
                'expired_date' => '2025-12-31',
                'keterangan' => 'Obat penurun demam'
            ],
            [
                'id' => 2,
                'kode_obat' => 'OBT-0002',
                'nama_obat' => 'Amoxicillin 500mg',
                'jenis_obat' => 'Kapsul',
                'satuan' => 'Kapsul',
                'stok' => 50,
                'harga' => 8000,
                'expired_date' => '2025-10-15',
                'keterangan' => 'Antibiotik'
            ],
            [
                'id' => 3,
                'kode_obat' => 'OBT-0003',
                'nama_obat' => 'Metformin 500mg',
                'jenis_obat' => 'Tablet',
                'satuan' => 'Tablet',
                'stok' => 75,
                'harga' => 12000,
                'expired_date' => '2025-11-30',
                'keterangan' => 'Obat diabetes'
            ]
        ];

        // Data Pasien (tetap sama)
        self::$pasien = [
            [
                'id' => 1,
                'no_rm' => 'RM-0001',
                'nama_pasien' => 'Budi Santoso',
                'nik' => '1234567890123456',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1980-05-15',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'A',
                'telepon' => '081234567890',
                'email' => 'budi@email.com',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'no_rm' => 'RM-0002',
                'nama_pasien' => 'Siti Rahayu',
                'nik' => '2345678901234567',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-08-20',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'B',
                'telepon' => '081234567891',
                'email' => 'siti@email.com',
                'alamat' => 'Jl. Asia Afrika No. 456, Bandung',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Data Dokter (tetap sama)
        self::$dokter = [
            [
                'id' => 1,
                'id_dokter' => 'DKT-001',
                'nama_dokter' => 'Dr. Andi Wijaya',
                'gelar' => 'Sp.A',
                'spesialisasi' => 'Anak',
                'no_sip' => 'SIP/2020/1234',
                'telepon' => '081234567892',
                'email' => 'andi@rs.com',
                'jadwal_praktek' => 'Senin - Jumat, 08:00-16:00',
                'tanggal_bergabung' => '2020-01-15',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'id_dokter' => 'DKT-002',
                'nama_dokter' => 'Dr. Maya Sari',
                'gelar' => 'Sp.PD',
                'spesialisasi' => 'Penyakit Dalam',
                'no_sip' => 'SIP/2019/5678',
                'telepon' => '081234567893',
                'email' => 'maya@rs.com',
                'jadwal_praktek' => 'Senin - Sabtu, 09:00-17:00',
                'tanggal_bergabung' => '2019-03-20',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Data Rawat Inap
        self::$rawatInap = [
            [
                'id' => 1,
                'no_rm' => 'RM-0001',
                'pasien_id' => 1,
                'nama_pasien' => 'Budi Santoso',
                'ruangan' => '301 - Mawar',
                'tanggal_masuk' => '2024-01-15',
                'dokter_id' => 1,
                'nama_dokter' => 'Dr. Andi Wijaya',
                'kelas_rawat' => 'VIP',
                'perkiraan_lama_rawat' => 5,
                'diagnosa_awal' => 'Demam Tifoid dengan komplikasi',
                'tindakan_awal' => 'Istirahat total, pemberian antibiotik, dan observasi ketat',
                'keterangan' => 'Pasien perlu observasi tanda-tanda vital setiap 4 jam',
                'status' => 'Dirawat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'no_rm' => 'RM-0002',
                'pasien_id' => 2,
                'nama_pasien' => 'Siti Rahayu',
                'ruangan' => '302 - Melati',
                'tanggal_masuk' => '2024-01-10',
                'dokter_id' => 2,
                'nama_dokter' => 'Dr. Maya Sari',
                'kelas_rawat' => 'Kelas I',
                'perkiraan_lama_rawat' => 3,
                'diagnosa_awal' => 'Diabetes Mellitus tipe 2',
                'tindakan_awal' => 'Terapi insulin dan diet ketat',
                'keterangan' => 'Monitoring gula darah 3x sehari',
                'status' => 'Dirawat',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Data Resep
        self::$resep = [
            [
                'id' => 1,
                'no_resep' => 'RSP-0001',
                'tanggal_resep' => '2024-01-16',
                'pasien_id' => 1,
                'nama_pasien' => 'Budi Santoso',
                'dokter_id' => 1,
                'nama_dokter' => 'Dr. Andi Wijaya',
                'diagnosa' => 'Demam Tifoid',
                'keterangan' => 'Minum setelah makan, hindari makanan pedas',
                'status' => 'Selesai',
                'detail_resep' => [
                    [
                        'id' => 1,
                        'obat_id' => 1,
                        'nama_obat' => 'Paracetamol 500mg',
                        'jumlah' => 10,
                        'satuan' => 'Tablet',
                        'aturan_pakai' => '3x1 sehari setelah makan'
                    ],
                    [
                        'id' => 2,
                        'obat_id' => 2,
                        'nama_obat' => 'Amoxicillin 500mg',
                        'jumlah' => 20,
                        'satuan' => 'Kapsul',
                        'aturan_pakai' => '2x1 sehari setelah makan'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'no_resep' => 'RSP-0002',
                'tanggal_resep' => '2024-01-17',
                'pasien_id' => 2,
                'nama_pasien' => 'Siti Rahayu',
                'dokter_id' => 2,
                'nama_dokter' => 'Dr. Maya Sari',
                'diagnosa' => 'Diabetes Mellitus tipe 2',
                'keterangan' => 'Dikonsumsi sesuai jadwal makan',
                'status' => 'Baru',
                'detail_resep' => [
                    [
                        'id' => 3,
                        'obat_id' => 3,
                        'nama_obat' => 'Metformin 500mg',
                        'jumlah' => 30,
                        'satuan' => 'Tablet',
                        'aturan_pakai' => '2x1 sehari bersamaan dengan makan'
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Data Transaksi
        self::$transaksi = [
            [
                'id' => 1,
                'no_transaksi' => 'TRX-0001',
                'tanggal_bayar' => '2024-01-16',
                'pasien_id' => 1,
                'nama_pasien' => 'Budi Santoso',
                'jenis_pembayaran' => 'Rawat Inap',
                'jumlah_bayar' => 2500000,
                'metode_bayar' => 'Transfer',
                'status_bayar' => 'Lunas',
                'diskon' => 0,
                'keterangan' => 'Pembayaran rawat inap 5 hari',
                'detail_transaksi' => [
                    [
                        'id' => 1,
                        'item' => 'Kamar VIP - 5 hari',
                        'jumlah' => 5,
                        'harga' => 400000,
                        'subtotal' => 2000000
                    ],
                    [
                        'id' => 2,
                        'item' => 'Obat-obatan',
                        'jumlah' => 1,
                        'harga' => 500000,
                        'subtotal' => 500000
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'no_transaksi' => 'TRX-0002',
                'tanggal_bayar' => '2024-01-17',
                'pasien_id' => 2,
                'nama_pasien' => 'Siti Rahayu',
                'jenis_pembayaran' => 'Rawat Jalan',
                'jumlah_bayar' => 750000,
                'metode_bayar' => 'Tunai',
                'status_bayar' => 'Lunas',
                'diskon' => 50000,
                'keterangan' => 'Konsultasi dan obat diabetes',
                'detail_transaksi' => [
                    [
                        'id' => 3,
                        'item' => 'Konsultasi Dokter Spesialis',
                        'jumlah' => 1,
                        'harga' => 300000,
                        'subtotal' => 300000
                    ],
                    [
                        'id' => 4,
                        'item' => 'Obat Metformin',
                        'jumlah' => 1,
                        'harga' => 500000,
                        'subtotal' => 500000
                    ]
                ],
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
    }

    // Getter methods (tetap sama)
    public static function getPasien() { return collect(self::$pasien); }
    public static function getDokter() { return collect(self::$dokter); }
    public static function getRawatInap() { return collect(self::$rawatInap); }
    public static function getResep() { return collect(self::$resep); }
    public static function getTransaksi() { return collect(self::$transaksi); }
    public static function getObat() { return collect(self::$obat); }

    // CRUD untuk Rawat Inap
    public static function addRawatInap($data)
    {
        $lastId = count(self::$rawatInap) > 0 ? max(array_column(self::$rawatInap, 'id')) : 0;
        $newId = $lastId + 1;

        $pasien = self::findPasien($data['pasien_id']);
        $dokter = self::findDokter($data['dokter_id']);

        $newRawatInap = [
            'id' => $newId,
            'no_rm' => $pasien['no_rm'],
            'pasien_id' => $data['pasien_id'],
            'nama_pasien' => $pasien['nama_pasien'],
            'ruangan' => $data['ruangan'],
            'tanggal_masuk' => $data['tanggal_masuk'],
            'dokter_id' => $data['dokter_id'],
            'nama_dokter' => $dokter['nama_dokter'],
            'kelas_rawat' => $data['kelas_rawat'],
            'perkiraan_lama_rawat' => $data['perkiraan_lama_rawat'],
            'diagnosa_awal' => $data['diagnosa_awal'],
            'tindakan_awal' => $data['tindakan_awal'],
            'keterangan' => $data['keterangan'],
            'status' => 'Dirawat',
            'created_at' => now(),
            'updated_at' => now()
        ];

        self::$rawatInap[] = $newRawatInap;
        return $newRawatInap;
    }

    public static function findRawatInap($id)
    {
        return collect(self::$rawatInap)->firstWhere('id', $id);
    }

    public static function updateRawatInap($id, $data)
    {
        $index = collect(self::$rawatInap)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            if (isset($data['pasien_id'])) {
                $pasien = self::findPasien($data['pasien_id']);
                self::$rawatInap[$index]['no_rm'] = $pasien['no_rm'];
                self::$rawatInap[$index]['nama_pasien'] = $pasien['nama_pasien'];
            }
            if (isset($data['dokter_id'])) {
                $dokter = self::findDokter($data['dokter_id']);
                self::$rawatInap[$index]['nama_dokter'] = $dokter['nama_dokter'];
            }

            self::$rawatInap[$index] = array_merge(self::$rawatInap[$index], $data, [
                'updated_at' => now()
            ]);
            return self::$rawatInap[$index];
        }

        return null;
    }

    public static function deleteRawatInap($id)
    {
        $index = collect(self::$rawatInap)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            array_splice(self::$rawatInap, $index, 1);
            return true;
        }

        return false;
    }

    public static function pulangkanPasien($id)
    {
        $index = collect(self::$rawatInap)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            self::$rawatInap[$index]['status'] = 'Pulang';
            self::$rawatInap[$index]['updated_at'] = now();
            return self::$rawatInap[$index];
        }

        return null;
    }

    // CRUD untuk Resep
    public static function addResep($data)
    {
        $lastId = count(self::$resep) > 0 ? max(array_column(self::$resep, 'id')) : 0;
        $newId = $lastId + 1;

        $pasien = self::findPasien($data['pasien_id']);
        $dokter = self::findDokter($data['dokter_id']);

        $newResep = [
            'id' => $newId,
            'no_resep' => 'RSP-' . str_pad($newId, 4, '0', STR_PAD_LEFT),
            'tanggal_resep' => now()->format('Y-m-d'),
            'pasien_id' => $data['pasien_id'],
            'nama_pasien' => $pasien['nama_pasien'],
            'dokter_id' => $data['dokter_id'],
            'nama_dokter' => $dokter['nama_dokter'],
            'diagnosa' => $data['diagnosa'],
            'keterangan' => $data['keterangan'],
            'status' => 'Baru',
            'detail_resep' => $data['detail_resep'] ?? [],
            'created_at' => now(),
            'updated_at' => now()
        ];

        self::$resep[] = $newResep;
        return $newResep;
    }

    public static function findResep($id)
    {
        return collect(self::$resep)->firstWhere('id', $id);
    }

    public static function updateResep($id, $data)
    {
        $index = collect(self::$resep)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            self::$resep[$index] = array_merge(self::$resep[$index], $data, [
                'updated_at' => now()
            ]);
            return self::$resep[$index];
        }

        return null;
    }

    public static function deleteResep($id)
    {
        $index = collect(self::$resep)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            array_splice(self::$resep, $index, 1);
            return true;
        }

        return false;
    }

    public static function prosesResep($id)
    {
        $index = collect(self::$resep)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            self::$resep[$index]['status'] = 'Selesai';
            self::$resep[$index]['updated_at'] = now();
            return self::$resep[$index];
        }

        return null;
    }

    // CRUD untuk Transaksi
    public static function addTransaksi($data)
    {
        $lastId = count(self::$transaksi) > 0 ? max(array_column(self::$transaksi, 'id')) : 0;
        $newId = $lastId + 1;

        $pasien = self::findPasien($data['pasien_id']);

        $newTransaksi = [
            'id' => $newId,
            'no_transaksi' => 'TRX-' . str_pad($newId, 4, '0', STR_PAD_LEFT),
            'tanggal_bayar' => now()->format('Y-m-d'),
            'pasien_id' => $data['pasien_id'],
            'nama_pasien' => $pasien['nama_pasien'],
            'jenis_pembayaran' => $data['jenis_pembayaran'],
            'jumlah_bayar' => $data['jumlah_bayar'],
            'metode_bayar' => $data['metode_bayar'],
            'status_bayar' => $data['status_bayar'] ?? 'Lunas',
            'diskon' => $data['diskon'] ?? 0,
            'keterangan' => $data['keterangan'],
            'detail_transaksi' => $data['detail_transaksi'] ?? [],
            'created_at' => now(),
            'updated_at' => now()
        ];

        self::$transaksi[] = $newTransaksi;
        return $newTransaksi;
    }

    public static function findTransaksi($id)
    {
        return collect(self::$transaksi)->firstWhere('id', $id);
    }

    public static function updateTransaksi($id, $data)
    {
        $index = collect(self::$transaksi)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            self::$transaksi[$index] = array_merge(self::$transaksi[$index], $data, [
                'updated_at' => now()
            ]);
            return self::$transaksi[$index];
        }

        return null;
    }

    public static function deleteTransaksi($id)
    {
        $index = collect(self::$transaksi)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index !== false) {
            array_splice(self::$transaksi, $index, 1);
            return true;
        }

        return false;
    }

    // Method untuk mendapatkan data master
    public static function getRuanganOptions()
    {
        return [
            '301 - Mawar (Kelas VIP)',
            '302 - Melati (Kelas I)',
            '303 - Anggrek (Kelas II)',
            '304 - Tulip (Kelas III)',
            '305 - Flamboyan (ICU)'
        ];
    }

    public static function getKelasRawatOptions()
    {
        return ['VIP', 'Kelas I', 'Kelas II', 'Kelas III'];
    }

    public static function getJenisPembayaranOptions()
    {
        return ['Rawat Jalan', 'Rawat Inap', 'IGD', 'Laboratorium', 'Radiologi', 'Farmasi'];
    }

    public static function getMetodeBayarOptions()
    {
        return ['Tunai', 'Transfer', 'Kartu Kredit', 'Kartu Debit'];
    }

    public static function getStatusBayarOptions()
    {
        return ['Lunas', 'Pending', 'Sebagian'];
    }
}

// Initialize data
DataService::init();