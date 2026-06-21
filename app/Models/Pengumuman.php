<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tipe',
        'lampiran',
        'is_active',
        'tanggal',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tanggal' => 'date',
    ];

    public const TIPE = [
        'info' => 'Informasi',
        'penting' => 'Penting',
        'kegiatan' => 'Kegiatan',
    ];

    protected static function booted(): void
    {
        static::saving(function (Pengumuman $item) {
            if (blank($item->slug)) {
                $item->slug = Str::slug($item->judul) . '-' . Str::random(5);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getLampiranUrlAttribute(): ?string
    {
        return $this->lampiran ? Storage::url($this->lampiran) : null;
    }
}
