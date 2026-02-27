<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'kode_pesanan',
        'user_id',
        'layanan_id',
        'nama_pemesan',
        'email_pemesan',
        'telepon',
        'deskripsi_tugas',
        'deadline',
        'total_harga',
        'harga_layanan',
        'status',
        'status_seen_at',
        'file_pendukung',
        'catatan_admin',
        'rating',
        'ulasan',
        'payment_method',
        'payment_proof',
        'payment_uploaded_at'
    ];

    protected $casts = [
        'deadline' => 'date',
        'total_harga' => 'decimal:2',
        'harga_layanan' => 'decimal:2',
        'payment_uploaded_at' => 'datetime',
        'status_seen_at' => 'datetime',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Layanan
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    /**
     * Relasi ke Order Items (multiple items per order)
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Generate unique order code
     */
    public static function generateKodePesanan()
    {
        $prefix = 'ORD';
        $date = date('Ymd');
        $random = strtoupper(substr(uniqid(), -6));
        return $prefix . $date . $random;
    }

    /**
     * Get status badge color
     */
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'draft' => 'bg-gray-500',
            'pending' => 'bg-yellow-500',
            'processing' => 'bg-blue-500',
            'completed' => 'bg-green-500',
            'cancelled' => 'bg-red-500',
            'selesai' => 'bg-purple-500',
            default => 'bg-gray-500'
        };
    }

    /**
     * Get status label in Indonesian
     */
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'draft' => 'Draft',
            'pending' => 'Menunggu Pembayaran',
            'processing' => 'Diproses',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            'selesai' => 'Selesai & Dinilai',
            default => 'Unknown'
        };
    }
}
