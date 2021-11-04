<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'jabatan',
        'npwp',
        'gaji_pokok',
        'tunjangan_kesehatan',
        'thr',
        'lembur',
        'tunjangan_bpjs',
        'iuran_bpjs_kesehatan',
        'jaminan_hari_tua',
        'jaminan_kematian',
        'jaminan_kecelakaan',
        'jaminan_pesiun',
        'pph21',
        'pot_dplk',
        'pot_denda',
        'pot_kredit',
        'bpjs_kes',
        'bpjs_jamsostek',
        'iuran_bpjstk',
        'iuran_jp',
    ];
}
