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
        $table->string('kondisi_kembali')->nullable(); // baik / rusak / hilang
    });
}

public function down()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->dropColumn('kondisi_kembali');
    });
}

};
