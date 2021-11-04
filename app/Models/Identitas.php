<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'identitas',
        'no_identitas',
        'tanggal_aktif',
        'berlaku_sampai',
    ];
}
