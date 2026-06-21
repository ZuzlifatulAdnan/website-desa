<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        'maps_embed',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Wisata $item) {
            if (blank($item->slug)) {
                $item->slug = Str::slug($item->judul) . '-' . Str::random(5);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? Storage::url($this->gambar)
            : 'https://placehold.co/600x400/4ade80/ffffff?text=' . urlencode($this->judul);
    }

    public function getFasilitasArrayAttribute(): array
    {
        return collect(preg_split('/[,\n]+/', (string) $this->fasilitas))
            ->map(fn ($f) => trim($f))
            ->filter()
            ->values()
            ->all();
    }
}
