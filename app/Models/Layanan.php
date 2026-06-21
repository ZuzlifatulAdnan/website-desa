<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'icon',
        'deskripsi',
        'persyaratan',
        'prosedur',
        'waktu_pelayanan',
        'biaya',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Layanan $item) {
            if (blank($item->slug)) {
                $item->slug = Str::slug($item->judul) . '-' . Str::random(5);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function permohonans()
    {
        return $this->hasMany(PermohonanLayanan::class);
    }

    public function getPersyaratanArrayAttribute(): array
    {
        return collect(preg_split('/[\n]+/', (string) $this->persyaratan))
            ->map(fn ($f) => trim(ltrim($f, '-• ')))
            ->filter()
            ->values()
            ->all();
    }

    public function getProsedurArrayAttribute(): array
    {
        return collect(preg_split('/[\n]+/', (string) $this->prosedur))
            ->map(fn ($f) => trim(ltrim($f, '-• ')))
            ->filter()
            ->values()
            ->all();
    }
}
