<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran',11);
            $table->foreignId('id_petugas',11);
            $table->string('nisn', 10);
            $table->string('bulan_dibayar', 8);
            $table->string('tahun_dibayar', 4);
            $table->foreignId('id_spp',11);
            $table->foreignId('jumlah_bayar',11);
            $table->timestamp('tgl_bayar');
            $table->string('nama_admin',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
