<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kode_pengetahuan',
        'file',
        'deskripsi',
    ];

}
