<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom yang diperlukan jika belum ada
            if (!Schema::hasColumn('users', 'user_type')) {
                $table->enum('user_type', ['mahasiswa', 'siswa', 'umum'])->after('id');
            }
            if (!Schema::hasColumn('users', 'nim')) {
                $table->string('nim', 20)->nullable()->unique()->after('user_type');
            }
            if (!Schema::hasColumn('users', 'nisn')) {
                $table->string('nisn', 20)->nullable()->unique()->after('nim');
            }
            if (!Schema::hasColumn('users', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'no_hp')) {
                $table->string('no_hp', 15)->nullable()->after('jenis_kelamin');
            }
            if (!Schema::hasColumn('users', 'alamat')) {
                $table->text('alamat')->nullable()->after('no_hp');
            }
            if (!Schema::hasColumn('users', 'pekerjaan')) {
                $table->string('pekerjaan', 100)->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('users', 'password')) {
                $table->string('password')->after('email');
            }
            if (!Schema::hasColumn('users', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = ['user_type', 'nim', 'nisn', 'jenis_kelamin', 'no_hp', 'alamat', 'pekerjaan', 'deleted_at'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
