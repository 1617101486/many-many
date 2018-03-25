<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFieldBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('barang', function($table) {
            $table->unsignedInteger('id_penyalur')->after('jumlah')->nullable();
            $table->foreign('id_penyalur')->references('id')->on('penyalur')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('barang', function($table) {
            $table->dropColumn('id_penyalur');
        });
    }
}
