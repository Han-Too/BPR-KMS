<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiBulanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'total_masuk',
        'total_izin',
        'total_sakit',
        'total_alpha',
        'total_terlambat',
        'jam_terlambat',
        'total_waktu',
        'tgl',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_karyawan', 'id_karyawan');
    }
}
