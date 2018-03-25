<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';

    protected $fillable = array('nik', 'nama','tanggal');

    protected $fillable1 = array('nik', 'nama','tanggal','id_barang');


    public function faktur() {
		return $this->belongsToMany('App\Faktur', 'detail_beli', 'id_faktur', 'id_pembelian');
	}
	public function barang() {
		return $this->belongsTo('App\Barang', 'id_barang');}

	
}
