<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
{
    protected $table = 'databarang';
    protected $fillable = ['barcode', 'nama_barang', 'stok', 'harga_beli', 'harga_jual_sedikit', 'harga_jual_banyak', 'harga_grosir'];
}
