<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
    ];

    protected static function booted(): void
    {
        static::saving(function (Kategori $item) {
            if (blank($item->slug)) {
                $item->slug = Str::slug($item->nama);
            }
        });
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
