<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create admins table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_admin');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Create layanans table
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->text('deskripsi_layanan');
            $table->decimal('harga_layanan', 10, 2);
            $table->timestamps();
        });

        // Create pesanans table
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');
            $table->decimal('harga_layanan', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
        Schema::dropIfExists('layanans');
        Schema::dropIfExists('admins');
    }
};