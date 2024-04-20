<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $table = 'destinasi';
    protected $fillable = [
        'destinasi_awal',
        'destinasi_akhir',
        'jenis_kendaraan',
        'no_plat',
        'hari_berangkat',
        'jumlah_kursi',
        'jumlah_bagasi',
        'foto',
        'deskripsi'
    ];

    protected $dates = ['hari_berangkat'];
}
