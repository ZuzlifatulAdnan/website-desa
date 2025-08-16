<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'jam_buka',
        'jam_tutup',
        'harga_tiket',
        'fasilitas',
        'lokasi',
    ];
}
