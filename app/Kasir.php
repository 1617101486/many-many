<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    //
    protected $table = 'kasir';

    protected $fillable = array('nik', 'nama','alamat');

    public function faktur() {
		return $this->hasMany('App\Faktur', 'id_kasir');}
}
