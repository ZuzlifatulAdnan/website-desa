<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'gambar',
        'kategori',
        'deskripsi',
        'order',
    ];

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? Storage::url($this->gambar)
            : 'https://placehold.co/600x400/e2e8f0/334155?text=Galeri';
    }
}
