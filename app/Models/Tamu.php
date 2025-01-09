<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamu';
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'no_hp',
        'jabatan_id',
        'tujuan_kunjungan',
        'jenis_tamu_id',
        'instansi',
        'nik',
        'foto',
    ];
}
