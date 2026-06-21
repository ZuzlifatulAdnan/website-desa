<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Aparatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'posisi',
        'nip',
        'gambar',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('id');
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? Storage::url($this->gambar)
            : 'https://placehold.co/200x200/334155/ffffff?text=' . urlencode(mb_substr($this->nama, 0, 1));
    }
}
