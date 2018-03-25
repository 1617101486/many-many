<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barang';

    protected $fillable = array('kode', 'nama','hargajual','hargabeli','jumlah');

    protected $fillable1 = array('kode', 'nama','hargajual','hargabeli','jumlah','id_penyalur');

    public function pembelian() {
		return $this->hasOne('App\Pembelian', 'id_barang');
	}

	public function penyalur() {
		return $this->belongsTo('App\Penyalur', 'id_penyalur');
	}
}
