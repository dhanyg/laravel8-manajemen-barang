<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_kategori');
            $table->string('nama', 100);
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 255);
            $table->string('penginput', 50);
            $table->string('penyunting', 50);
            $table->foreign('id_kategori')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
