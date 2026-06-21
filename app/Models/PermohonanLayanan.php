<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PermohonanLayanan extends Model
{
    protected $table = 'permohonan_layanans';

    protected $fillable = [
        'kode',
        'layanan_id',
        'nama',
        'nik',
        'email',
        'no_telp',
        'alamat',
        'keperluan',
        'lampiran',
        'status',
        'catatan',
    ];

    public const STATUS = [
        'menunggu' => 'Menunggu',
        'diproses' => 'Diproses',
        'selesai' => 'Selesai',
        'ditolak' => 'Ditolak',
    ];

    public const STATUS_COLOR = [
        'menunggu' => 'gray',
        'diproses' => 'warning',
        'selesai' => 'success',
        'ditolak' => 'danger',
    ];

    protected static function booted(): void
    {
        static::creating(function (PermohonanLayanan $item) {
            if (blank($item->kode)) {
                $item->kode = 'PMH-' . strtoupper(Str::random(8));
            }
        });
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS[$this->status] ?? $this->status;
    }

    public function getLampiranUrlAttribute(): ?string
    {
        return $this->lampiran ? Storage::url($this->lampiran) : null;
    }
}
