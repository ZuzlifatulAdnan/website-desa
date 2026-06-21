<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DesaProfile extends Model
{
    protected $guarded = [];

    protected $casts = [
        'misi' => 'array',
        'jumlah_penduduk' => 'integer',
        'jumlah_kk' => 'integer',
        'jumlah_laki' => 'integer',
        'jumlah_perempuan' => 'integer',
        'jumlah_dusun' => 'integer',
        'peta_zoom' => 'integer',
    ];

    /**
     * Ambil baris pengaturan tunggal (singleton). Dibuat otomatis bila belum ada.
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1]);
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->logo
            ? Storage::url($this->logo)
            : asset('img/logo/logo.png');
    }

    public function getFaviconUrlAttribute(): string
    {
        return $this->favicon
            ? Storage::url($this->favicon)
            : asset('favicon.ico');
    }

    public function getFotoSampulUrlAttribute(): ?string
    {
        return $this->foto_sampul ? Storage::url($this->foto_sampul) : null;
    }

    public function getFotoKantorUrlAttribute(): ?string
    {
        return $this->foto_kantor ? Storage::url($this->foto_kantor) : null;
    }

    public function getMisiListAttribute(): array
    {
        return is_array($this->misi) ? $this->misi : [];
    }
}
