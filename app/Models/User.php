<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'user_type',
        'name',
        'nim',
        'nisn',
        'email',
        'password',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'pekerjaan',
        'email_verified_at',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Scope untuk filter berdasarkan tipe user
    public function scopeMahasiswa($query)
    {
        return $query->where('user_type', 'mahasiswa');
    }

    public function scopeUmum($query)
    {
        return $query->where('user_type', 'umum');
    }

    public function scopeSiswa($query)
    {
        return $query->where('user_type', 'siswa');
    }

    // Method untuk mengecek tipe user
    public function isMahasiswa()
    {
        return $this->user_type === 'mahasiswa';
    }

    public function isUmum()
    {
        return $this->user_type === 'umum';
    }

    public function isSiswa()
    {
        return $this->user_type === 'siswa';
    }
}
