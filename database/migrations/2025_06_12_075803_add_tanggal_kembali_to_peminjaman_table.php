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
    Schema::table('peminjaman', function (Blueprint $table) {
        if (! Schema::hasColumn('peminjaman', 'tanggal_kembali')) {
            $table->date('tanggal_kembali')->nullable()->after('tanggal_pinjam');
        }
    });
}


public function down()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->dropColumn('tanggal_kembali');
    });
}

};
