<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    //
    use HasFactory;

    protected $table = 'agenda';
    protected $fillable = [
        'tanggal_kegiatan',
        'jam',
        'pelaksana',
        'agenda',
        'tempat',
    ];
}
