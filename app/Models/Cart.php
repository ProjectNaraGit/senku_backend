<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'layanan_id',
        'quantity',
        'harga_satuan',
        'subtotal',
        'session_id'
    ];

    protected $casts = [
        'harga_satuan' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    /**
     * Relationship dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship dengan Layanan
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
