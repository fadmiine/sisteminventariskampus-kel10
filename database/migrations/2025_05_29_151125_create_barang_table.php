<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('nama_barang', 255);
            $table->integer('stock');
            $table->decimal('harga', 10, 2);
            $table->string('satuan', 20);
            $table->boolean('status');
            $table->timestamps();

            // FOREIGN KEY ke karyawan(id_karyawan)
            $table->foreign('karyawan_id')
                ->references('id_karyawan')
                ->on('karyawan')
                ->onDelete('cascade');

            // FOREIGN KEY ke kategori(id_kategori)
            $table->foreign('kategori_id')
                ->references('id_kategori')
                ->on('kategori')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
