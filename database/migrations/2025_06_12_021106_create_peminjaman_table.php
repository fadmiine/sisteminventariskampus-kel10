<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('peminjaman', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // yang meminjam
        $table->unsignedBigInteger('inventaris_id'); // barang yang dipinjam
        $table->date('tanggal_pinjam');
        $table->date('tanggal_kembali')->nullable();
        $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'dikembalikan'])->default('menunggu');
        $table->unsignedBigInteger('disetujui_oleh')->nullable(); // admin/staff yang validasi
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('inventaris_id')->references('id')->on('inventaris')->onDelete('cascade');
        $table->foreign('disetujui_oleh')->references('id')->on('users')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('peminjaman', function (Blueprint $table) {
    $table->enum('kondisi_kembali', ['baik', 'rusak', 'hilang'])->nullable();
});

    }
};
