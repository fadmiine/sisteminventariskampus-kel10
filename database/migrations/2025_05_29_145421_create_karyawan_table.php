<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_karyawan');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('no_hp', 16);
            $table->date('tgl_perekrutan');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('karyawan');
    }
};