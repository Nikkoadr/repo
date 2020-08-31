<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databarang', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('nama_barang');
            $table->string('stok');
            $table->string('harga_beli');
            $table->string('harga_jual_sedikit');
            $table->string('harga_jual_banyak');
            $table->string('harga_grosir');
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
        Schema::dropIfExists('databarang');
    }
}
