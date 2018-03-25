<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    protected $table = 'faktur';

    protected $fillable = array('kode', 'tanggal');

    protected $fillable1 = array('kode', 'tanggal', 'id_kasir');

    public function kasir() {
		return $this->belongsTo('App\Kasir', 'id_kasir');
	}

    public function pembelian() {
		return $this->belongsToMany('App\Pembelian', 'detail_beli', 'id_faktur', 'id_pembelian');
	}

	
}
