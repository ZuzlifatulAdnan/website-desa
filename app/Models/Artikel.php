<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'deskripsi',
        'gambar',
        'kategori_id',
        'user_id',
        'status',
        'is_featured',
        'views',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'views' => 'integer',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Artikel $item) {
            if (blank($item->slug)) {
                $item->slug = Str::slug($item->judul) . '-' . Str::random(5);
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? Storage::url($this->gambar)
            : 'https://placehold.co/800x500/84cc16/ffffff?text=' . urlencode($this->judul);
    }
}
