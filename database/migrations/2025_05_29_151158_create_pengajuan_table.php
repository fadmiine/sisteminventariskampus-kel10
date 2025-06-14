<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('pengaju_id');
            $table->unsignedBigInteger('penyetuju_id');

            // Tambahkan kolom barang_id sebelum foreign key-nya
            $table->unsignedBigInteger('barang_id');

            $table->text('keperluan');
            $table->date('tgl_pengajuan');
            $table->date('tgl_batas');
            $table->enum('status', ['Menunggu', 'Disetujui', 'Ditolak', 'Dikembalikan']);
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('barang_id')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->foreign('pengaju_id')->references('id_karyawan')->on('karyawan')->onDelete('cascade');
            $table->foreign('penyetuju_id')->references('id_karyawan')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pengajuan');
    }
};
