<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    protected $table = 'apbdes';

    protected $fillable = [
        'tahun',
        'jenis',
        'uraian',
        'jumlah',
        'keterangan',
        'order',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'order' => 'integer',
    ];

    public const JENIS = [
        'pendapatan' => 'Pendapatan',
        'belanja' => 'Belanja',
        'pembiayaan' => 'Pembiayaan',
    ];

    public function getJumlahFormatAttribute(): string
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }
}
