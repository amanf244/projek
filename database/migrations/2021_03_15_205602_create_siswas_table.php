<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->char('nisn',10);
            $table->char('nis',8);
            $table->string('nama',35);
            $table->string('nama_admin',35);
            $table->foreignId('id_kelas',11);
            $table->text('alamat');
            $table->string('no_telp',13);
            $table->foreignId('id_spp',11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
