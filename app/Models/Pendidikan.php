<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'jenjang',
        'institusi_pendidikan',
        'kota_pendidikan',
        'tgl_masuk',
        'status',
        'tgl_status',
        'nilai',
    ];
}
