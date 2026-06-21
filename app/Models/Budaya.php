<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Budaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'jadwal',
        'aktivitas',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Budaya $item) {
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
            : 'https://placehold.co/600x650/22c55e/ffffff?text=' . urlencode($this->judul);
    }

    public function getAktivitasArrayAttribute(): array
    {
        return collect(preg_split('/[\n]+/', (string) $this->aktivitas))
            ->map(fn ($f) => trim(ltrim($f, '-• ')))
            ->filter()
            ->values()
            ->all();
    }
}
