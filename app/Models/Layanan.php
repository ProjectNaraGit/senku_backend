<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    
    protected $fillable = [
        'nama_layanan',
        'deskripsi_layanan',
        'harga_layanan',
    ];

    protected $casts = [
        'harga_layanan' => 'decimal:2',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'layanan_id');
    }
}
