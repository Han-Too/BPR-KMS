<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'institusi_pekerjaan',
        'kota_pekerjaan',
        'jabatan',
        'tgl_masuk',
        'tgl_keluar',
        'keluar',
    ];
}
