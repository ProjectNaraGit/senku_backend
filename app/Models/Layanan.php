<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Pesanan;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';
    
    protected $fillable = [
        'nama_layanan',
        'kategori',
        'deskripsi_layanan',
        'harga_layanan',
        'gambar_layanan',
        'slug',
        'is_active',
        'order',
    ];

    protected $casts = [
        'harga_layanan' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'layanan_id');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if (!$this->gambar_layanan) {
            return asset('images/layanan-placeholder.png');
        }

        $path = $this->gambar_layanan;

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        // Cek di folder public/images/layanan/ (prioritas utama)
        $fullPath = public_path('images/layanan/' . $path);
        if (file_exists($fullPath)) {
            return asset('images/layanan/' . $path);
        }

        // Cek di folder public/images/ (fallback)
        $fullPath = public_path('images/' . $path);
        if (file_exists($fullPath)) {
            return asset('images/' . $path);
        }

        // Cek di folder public/ langsung
        if (file_exists(public_path($path))) {
            return asset($path);
        }

        if (Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::url($path);
        }

        // Fallback ke placeholder jika semua kondisi gagal
        return asset('images/layanan-placeholder.png');
    }
}
