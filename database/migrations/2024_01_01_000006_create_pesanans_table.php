<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('telepon');
            $table->text('deskripsi_tugas');
            $table->date('deadline');
            $table->decimal('total_harga', 10, 2);
            $table->decimal('harga_layanan', 10, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'selesai'])->default('pending');
            $table->string('file_pendukung')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->integer('rating')->nullable();
            $table->text('ulasan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
