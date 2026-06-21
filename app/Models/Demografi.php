<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    protected $table = 'demografis';

    protected $fillable = [
        'kategori',
        'label',
        'jumlah',
        'order',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'order' => 'integer',
    ];

    public const KATEGORI = [
        'pekerjaan' => 'Pekerjaan',
        'pendidikan' => 'Pendidikan',
        'agama' => 'Agama',
        'usia' => 'Kelompok Usia',
        'dusun' => 'Dusun',
    ];

    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori)->orderBy('order');
    }
}
